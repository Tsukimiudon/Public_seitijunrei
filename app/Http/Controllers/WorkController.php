<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Http\Controllers\Post;
use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{
    //作品登録機能
    public function create_work()
    {
        return view('works.create_work');
    }
    
    //作品登録を保存する機能
    public function store_work(WorkRequest $request, Work $work)
    {
        $input = $request['work'];
        $work->fill($input)->save();
        return redirect('/works/create');
    }
    
    
    //作品タグ一覧表示ページ
    public function index_work(Work $work)
    {
        return view('works.index_work')->with(['works' => $work->getPaginateWorkByLimit()]);
    }
    
    //作品別投稿一覧ページ
    public function show_work(Work $work)
    {
        return view('works.show_work')->with(['works' => $work->getByWork()])->with(['work' => $work]);
    }
    
    //作品情報を更新する機能
    public function edit_work(Work $work)
    {
        return view('works.edit_work')->with(['work' => $work]);
    }
    
     //作品情報の更新をDBに保存する機能
    public function update_work(WorkRequest $request, Work $work)
    {
        $input = $request['work'];
        $work->fill($input)->save();
        return redirect('/works/' . $work->id);
    }
    
    //作品情報を削除する機能
    public function delete_work(Work $work)
    {
        $work->delete();
        return redirect('/top');
    }
}