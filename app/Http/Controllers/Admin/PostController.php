<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Category;
use App\Models\Files;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const LIMIT_FILE_SIZE_UPLOAD_1_GB = '1000000000';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin = auth()->user()->is_admin;
        if (! $is_admin) {
            $posts = Post::with(['user', 'category', 'tags', 'comments'])
                ->orderBy('created_at', 'desc')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
        } else {
            $posts = Post::with(['user', 'category', 'tags', 'comments'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'name')->all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        $tagsId = collect($request->tags)->map(function ($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        if ($request->has('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            if ($fileSize < self::LIMIT_FILE_SIZE_UPLOAD_1_GB) {
                if (! Storage::disk('public')->exists('files')) {
                    Storage::disk('public')->makeDirectory('files');
                }
                $postId = $post->id;
                $userId = auth()->user()->getAuthIdentifier();
                $file->store("public/$userId".'_'.$postId);

                Files::create([
                    'file_name' => $request->file('file')->hashName(),
                    'user_id' => $userId,
                    'post_id' => $postId,
                    'file_name_origin' => $fileName,
                    'file_size' => $fileSize,
                ]);
            }
        }

        $post->tags()->attach($tagsId);
        flash()->overlay(trans('posts.notifi_created_success'));

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post->load(['user', 'category', 'tags', 'comments']);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            flash()->overlay("You can't edit other peoples post.");

            return redirect('/admin/posts');
        }

        $categories = Category::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'name')->all();
        $files = Files::where('post_id', $post->id)->get()->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // disbust cache
        Cache::forget($post->etag);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        $tagsId = collect($request->tags)->map(function ($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        if ($request->has('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            if ($fileSize < self::LIMIT_FILE_SIZE_UPLOAD_1_GB) {
                if (! Storage::disk('public')->exists('files')) {
                    Storage::disk('public')->makeDirectory('files');
                }
                $postId = $post->id;
                $userId = auth()->user()->getAuthIdentifier();
                $file->store("public/$userId".'_'.$postId);

                Files::create([
                    'file_name' => $request->file('file')->hashName(),
                    'user_id' => $userId,
                    'post_id' => $postId,
                    'file_name_origin' => $fileName,
                    'file_size' => $fileSize,
                ]);
            }
        }

        $post->tags()->sync($tagsId);
        flash()->overlay(trans('posts.notifi_updated_success'));

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            flash()->overlay("You can't delete other peoples post.");

            return redirect('/admin/posts');
        }

        $post->delete();
        flash()->overlay(trans('posts.notifi_delete'));

        return redirect('/admin/posts');
    }

    public function publish(Post $post)
    {
        $post->is_published = ! $post->is_published;
        $post->save();
        flash()->overlay(trans('posts.notifi_change'));

        return redirect('/admin/posts');
    }
}
