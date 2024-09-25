<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>投稿編集</title>
    </x-slot>
    
    <div class="container">
        <!--見出し-->
        <div class="row">
            <div class="box-rose">
                <h1 class="fs-1 fw-lighter text-center">投稿編集</h1>
            </div>
        </div>
        
        <div class="container-fluid">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!--タイトル入力-->
                <div class="row mb-3">
                    <label for="post_title" class="fs-4 fw-lighter">タイトル</label>
                    <input id="post_title" class="input-rose-custom" type="text" name="post[title]" value="{{ $post->title }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                
                <!--本文入力-->
                <div class="row mb-3">
                    <label for="post_body" class="fs-4 fw-lighter">本文</label>
                    <textarea id="post_body" class="input-rose-custom" style="resize: none" rows="5" name="post[body]">{{ $post->body }}</textarea>
                    <p class="input__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                
                <!--聖地についての情報（placesテーブル）-->
                @foreach($post->places as $place)
                    <div class="row mb-3">
                        <label for="place_name" class="fs-4 fw-lighter">聖地の名前</label>
                        <input id="place_name" class="input-rose-custom" type="text" name="place[name]" value="{{ $place->name }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('place.name') }}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="place_caption" class="fs-4 fw-lighter">聖地の情報</label>
                        <input id="place_caption" class="input-rose-custom" type="text" name="place[caption]" value="{{ $place->caption }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('place.caption') }}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="place_address" class="fs-4 fw-lighter">聖地の住所</label>
                        <input id="place_address" class="input-rose-custom" type="text" name="place[address]" value="{{ $place->address }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('place.address') }}</p>
                    </div>
                @endforeach
                
                <!--聖地の写真アップロード-->
                <div class="real_image">
                    <h2>聖地の写真を変更する場合はアップロードしてください</h2>
                    <input type="file" name="real_image_url">
                    <p>現在の画像</p>
                    @foreach($post->images as $image)
                        <figure class="real_photo"><img src="{{ $image->real_image_url }}"></figure>
                    @endforeach
                </div>
                
                <!--イラストなどアップロード-->
                <div class="anime_image">
                    @foreach($post->images as $image)
                        @if($image->anime_image_url)
                            <h2>聖地に関連するイラストなどを変更する場合はアップロードしてください</h2>
                            <input type="file" name="anime_image_url">
                            <p>現在の画像</p>
                            <figure class="anime_photo"><img src="{{ $image->anime_image_url }}" alt="画像が読み込めません。"></figure>
                        @else
                            <h2>聖地に関連するイラストなどをアップロードしてください</h2>
                            <input type="file" name="anime_image_url">
                        @endif
                    @endforeach
                </div>
                
                <!--アイキャッチ画像アップロード-->
                <div class="eyecatch">
                    <h2>アイキャッチ用画像を変更する場合はアップロードしてください</h2>
                    <input type="file" name="eyecatch_url">
                    <p>現在の画像</p>
                    <figure class="eyecatch_photo"><img src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。"></figure>
                </div>
                
                <!--作品タグ選択-->
                <div class="row mb-3">
                    <h2 class="fs-4 fw-lighter mb-1">作品タグ選択</h2>
                    <select class="select-rose" name="post[work_id]">
                        <option>作品タグを選択</option>
                        @foreach($works as $work)
                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!--更新ボタン-->
                <div class="row">
                    <div class="col d-flex justify-content-end mb-3">
                        <input type="submit" class="btn btn-rose-outline" value="更新"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>