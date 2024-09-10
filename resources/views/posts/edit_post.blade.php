<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>投稿編集</title>
    </x-slot>
    
        <h1>投稿編集画面</h1>
        <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!--タイトル入力-->
            <div class="title">
                <h2>タイトルを入力してください</h2>
                <input type="text" name="post[title]" placeholder="タイトルを入力してください。" value="{{ $post->title }}"/>
                <p class="input__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <!--本文入力-->
            <div class="body">
                <h2>本文を入力してください</h2>
                <textarea name="post[body]" placeholder="本文を入力してください。">{{ $post->body }}</textarea>
                <p class="input__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
            <!--聖地についての情報（placesテーブル）-->
            <div class="place">
                <h2>聖地についての情報を入力してください</h2>
                @foreach($post->places as $place)
                    <input type="text" name="place[name]" placeholder="聖地の名前を入力してください。" value="{{ $place->name }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('place.name') }}</p>
                    <input type="text" name="place[caption]" placeholder="聖地の情報を入力してください。" value="{{ $place->caption }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('place.caption') }}</p>
                    <input type="text" name="place[address]" placeholder="聖地の住所を入力してください。" value="{{ $place->address }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('place.address') }}</p>
                @endforeach
            </div>
            
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
            
            <!--タグ選択-->
            <div class="work">
                <h2>作品タグ選択</h2>
                <select name="post[work_id]">
                    @foreach($works as $work)
                    <option value="{{ $work->id }}">{{ $work->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="更新"/>
        </form>

</x-app-layout>