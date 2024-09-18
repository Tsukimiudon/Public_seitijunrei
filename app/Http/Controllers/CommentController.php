<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //コメント投稿保存機能
    public function store_comment(Request $request, Post $post)
    {
        $request->validate([
        'body' => 'required|string|max:500', // バリデーションを追加
        ]);
        
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        
        //作成した投稿の詳細ページにリダイレクト
        return redirect('/posts/' . $post->id);
    }
    
    public function delete_comment(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();
        return redirect('/posts/' . $postId);
    }
}
