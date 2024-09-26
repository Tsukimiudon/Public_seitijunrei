<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Work;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //投稿者別投稿一覧ページ
    public function user_post(User $user, Work $work)
    {
        return view('posts.user_post')->with(['users' => $user->getPaginateByUser()])->with(['user' => $user]);
    }
    
    //権限付与画面
    public function edit_admin()
    {
        $user = User::orderBy('name', 'asc')->get();
        return view('profile.edit_admin')->with(['users' => $user]);
    }
}