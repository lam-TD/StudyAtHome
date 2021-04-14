<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('title', 'like', "%$search%")->orWhere('body', 'like', "%$search%");
        })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->with('files')
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(5);

        return view('frontend.index', compact('posts'));
    }

    public function post(Post $post)
    {
        $post = $post->load(['comments.user', 'tags', 'user', 'category']);

        return view('frontend.post', compact('post'));
    }

    public function comment(Request $request, Post $post)
    {
        $this->validate($request, ['body' => 'required']);

        $post->comments()->create([
            'body' => $request->body,
        ]);
        flash()->overlay(trans('comments.notifi_create'));

        return redirect("/posts/{$post->id}");
    }

    public function download($file_id)
    {
        $headers = [
            'Content-Type: application/octet-stream',
        ];
        $file = Files::find($file_id)->toArray();
        $path = "public/{$file['user_id']}".'_'.$file['post_id'].'/'.$file['file_name'];
        return Storage::download($path, $file['file_name_origin'], $headers);
    }
}
