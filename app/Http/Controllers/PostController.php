<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use App\Http\Requests\PostRequest;
use App\Models\Work;
use App\Models\Place;
use App\Models\Image;
use App\Models\User;
use Auth;
use Validator;
use Cloudinary;


class PostController extends Controller
{
    //topページ
    public function top(Post $post)
    {
        return view('posts.top')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    //投稿一覧ページ
    public function index_post(Post $post)
    {
        return view('posts.index_post')->with(['posts' => $post->getPaginateByLimit_index_post()]);
    }
    
    //投稿詳細ページ
    public function show_post(Post $post)
    {
        $api_key = config('app.api_key');
        $places = Post::with('places')->get();
        $images = Post::with('places.images')->get();
        return view('posts.show_post')->with(['post' => $post])->with(['api_key' => $api_key]);
    }
    
    //投稿作成ページ
    public function create_post(Work $work)
    {
        return view('posts.create_post')->with(['works' => $work->get()]);
    }
    
    //作成した投稿をDBに保存する機能
    public function store_post(PostRequest $request, Post $post, Place $place, Image $image)
    {
        //postsテーブルにデータを格納
        $input = $request['post'];
        if($request->file('eyecatch_url')){
            $eyecatch_url = Cloudinary::upload($request->file('eyecatch_url')->getRealPath())->getSecurePath();
            $input += ['eyecatch_url' => $eyecatch_url];
        }
        else{
            $input += ['eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724152178/no_image_rtipge.png'];
        }
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        
        
        //placesテーブルにデータを格納する流れ
        $input = $request['place'];
        
        //住所から緯度経度を取得する
        $address = $input['address'];
        
        //APIキー
        $api_key = config('app.api_key');
        
        $address = urlencode($address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "+CA&key=" . $api_key;
        $contents= file_get_contents($url);
        $jsonData = json_decode($contents,true);
        
        $lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
        $lng = $jsonData["results"][0]["geometry"]["location"]["lng"];
        
        $input += ['latitude' => $lat];
        $input += ['longitude' => $lng];
        
        $input['post_id'] = $post->id;
        $place->fill($input)->save();
        
        
        //imagesテーブルにデータを格納
        $real_image_url = Cloudinary::upload($request->file('real_image_url')->getRealPath())->getSecurePath();
        $input += ['real_image_url' => $real_image_url];
        if($request->file('anime_image_url')){
            $anime_image_url = Cloudinary::upload($request->file('anime_image_url')->getRealPath())->getSecurePath();
            $input += ['anime_image_url' => $anime_image_url];
        }
        $input['post_id'] = $post->id;
        $input['place_id'] = $place->id;
        $image->fill($input)->save();
        
        //作成した投稿の詳細ページにリダイレクト
        return redirect('/posts/' . $post->id);
    }
    
    //投稿を編集
    public function edit_post(Post $post, Work $work)
    {
        $places = Post::with('places')->get();
        $images = Post::with('places.images')->get();
        return view('posts.edit_post')->with(['post' => $post])->with(['works' => $work->get()]);
    }
    
    //投稿の編集を保存
    public function update_post(PostRequest $request, Post $post, Place $place, Image $image)
    {
        dd($request->method());
        //places,imagesテーブルのデータを取得
        $place = Place::where('post_id', $post->id)->first();
        $image = Image::where('post_id', $post->id)->first();
        
        //postsテーブルにデータを格納
        $input = $request['post'];
        
        //アイキャッチ画像の処理
        if($request->file('eyecatch_url')){
            $eyecatch_url = Cloudinary::upload($request->file('eyecatch_url')->getRealPath())->getSecurePath();
            $input += ['eyecatch_url' => $eyecatch_url];
        }
        else{
            $eyecatch_url = $post['eyecatch_url'];
            $input += ['eyecatch_url' => $eyecatch_url];
        }
        $post->fill($input)->save();
        
        //placesテーブルにデータを格納する流れ
        $input = $request['place'];
        
        //住所から緯度経度を取得する
        $address = $input['address'];
        
        //APIキー
        $api_key = config('app.api_key');
        
        $address = urlencode($address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "+CA&key=" . $api_key;
        $contents= file_get_contents($url);
        $jsonData = json_decode($contents,true);
        
        $lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
        $lng = $jsonData["results"][0]["geometry"]["location"]["lng"];
        
        $input += ['latitude' => $lat];
        $input += ['longitude' => $lng];
        
        $input['post_id'] = $post->id;
        $place->fill($input)->save();
        
        //imagesテーブルにデータを格納
        if ($request->hasFile('real_image_url')) {
            $real_image_url = Cloudinary::upload($request->file('real_image_url')->getRealPath())->getSecurePath();
            $input += ['real_image_url' => $real_image_url];
        }else{
            $real_image_url = $image['real_image_url'];
            $input += ['real_image_url' => $real_image_url];
        }
        
        if($request->hasfile('anime_image_url')){
            $anime_image_url = Cloudinary::upload($request->file('anime_image_url')->getRealPath())->getSecurePath();
            $input += ['anime_image_url' => $anime_image_url];
        }
        $input['post_id'] = $post->id;
        $input['place_id'] = $place->id;
        $image->fill($input)->save();
        
        //編集した投稿の詳細ページにリダイレクト
        return redirect('/posts/' . $post->id);
    }
    
    //投稿を削除する機能
    public function delete_post(Post $post)
    {
        $post->delete();
        return redirect('/top');
    }
    
    //ブックマークした記事の一覧を取得
    public function bookmark_posts()
    {
        $posts = \Auth::user()->bookmark_posts()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'posts' => $posts,
            ];
        return view('posts.bookmarks', $data);
    }
    
    //マイページ機能
    public function mypage()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        return view('posts.mypage')->with(['user' => $user]);
    }
    
    //マイページの自分の投稿一覧ページ
    public function mypage_post(Post $post){
        return view('posts.mypage_post')->with(['posts' => $post->getPaginateByLimit_index_post()]);
    }
}