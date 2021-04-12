<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Post;
use Illuminate\Http\Request;

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
                    ->withCount('files')
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(5);
        $newData = [];
        foreach ($posts as $post) {
            $post['files_list'] = Files::where('post_id', $post->id)->get()->toArray();
            $newData[] = $post;
        }
        $posts = $newData;
//        dd($posts);
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
        flash()->overlay('Comment successfully created');

        return redirect("/posts/{$post->id}");
    }
}
