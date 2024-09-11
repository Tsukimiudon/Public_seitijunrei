<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookmarkController extends Controller
{
    //ブックマーク機能
    public function store_bookmark($postId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($postId)) {
            $user->bookmark_posts()->attach($postId);
        }
        return back();
    }
    
    //ブックマーク解除機能
    public function delete_bookmark($postId) {
        $user = \Auth::user();
        if ($user->is_bookmark($postId)) {
            $user->bookmark_posts()->detach($postId);
        }
        return back();
    }
}