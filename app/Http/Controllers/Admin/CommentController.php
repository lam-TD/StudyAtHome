<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin = auth()->user()->is_admin;
        if (! $is_admin) {
            $comments = Comment::with('post')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
        } else {
            $comments = Comment::with('post')->paginate(10);
        }


        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            flash()->overlay("You can't delete other peoples comment.");

            return redirect('/admin/posts');
        }

        $comment->delete();
        flash()->overlay(trans('comments.notifi_delete'));

        return redirect('/admin/comments');
    }
}
