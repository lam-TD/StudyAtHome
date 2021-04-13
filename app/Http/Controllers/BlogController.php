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
                    ->withCount('files')
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(5);
        $newData = [];
        foreach ($posts as $post) {
            $fileList = Files::where('post_id', $post->id)->get()->toArray();
            $newFileList = [];
            if (! empty($fileList)) {
                foreach ($fileList as $item) {
                    $item['url_download'] = 'posts/download/'.$item['id'];
                    $item['file_size'] = self::humanReadableBytes($item['file_size']);
                    $newFileList[] = $item;
                }
            }
            $post['files_list'] = $newFileList;
            $newData[] = $post;
        }
        $posts = $newData;

        return view('frontend.index', compact('posts'));
    }

    public static function humanReadableBytes($bytes, $precision = 2)
    {
        $byteUnit = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];
        $bytePrecision = [0, 0, 1, 2, 2, 3, 3, 4, 4];
        $byteNext = 1024;
        for ($i = 0; ($bytes / $byteNext) >= 0.9 && $i < count($byteUnit); $i++) $bytes /= $byteNext;
        return round($bytes, is_null($precision) ? $bytePrecision[$i] : $precision) . ' ' . $byteUnit[$i];
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

    public function download(Request $request, $file_id)
    {
        $headers = [
            'Content-Type: application/octet-stream',
        ];
        $file = Files::find($file_id)->toArray();
        $path = "public/{$file['user_id']}".'_'.$file['post_id'].'/'.$file['file_name'];

        return Storage::download($path, $file['file_name_origin'], $headers);
    }
}
