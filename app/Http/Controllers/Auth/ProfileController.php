<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user()->loadCount('posts', 'comments');

        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:5|max:20',
            ]);

            $user = User::find(auth()->user()->getAuthIdentifier());
            $user->name = $request->name;

            if ($user->save()) {
                $is_update_success = 'Cập nhật thông tin thành công';
//                return view('admin.profile.edit', compact(['user', 'is_update_success']));
            }
            flash()->overlay(trans('users.notifi_updated_success'));
            return redirect('profile');
        } else {
            $user = auth()->user()->loadCount('posts', 'comments');
            return view('admin.profile.edit', compact('user'));
        }
    }
}
