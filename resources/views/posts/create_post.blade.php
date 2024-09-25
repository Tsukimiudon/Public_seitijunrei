<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>投稿作成</title>
    </x-slot>
        <div class="container">
            <!--見出し-->
            <div class="row">
                <div class="box-rose">
                    <h1 class="fs-1 fw-lighter text-center">投稿作成</h1>
                </div>
            </div>
            
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" value="{{ old('post.title') }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                
                <div class="body">
                    <h2>本文</h2>
                    <textarea name="post[body]">{{ old('post.body') }}</textarea>
                    <p class="input__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                
                <div class="place">
                    <h2>聖地</h2>
                    <input type="text" name="place[name]" value="{{ old('place.name') }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('place.name') }}</p>
                    <input type="text" name="place[caption]" value="{{ old('place.caption') }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('place.caption') }}</p>
                    <input type="text" name="place[address]" value="{{ old('place.address') }}"/>
                    <p class="input__error" style="color:red">{{ $errors->first('place.address') }}</p>
                </div>
                
                <div class="real_image">
                    <h2>聖地の写真</h2>
                    <input type="file" name="real_image_url" id="real_image_input">
                    <img id="real_image_preview">
                    <p class="input__error" style="color:red">{{ $errors->first('real_image_url') }}</p>
                </div>
                
                <div class="anime_image">
                    <h2>聖地に関連するイラストなどをアップロードしてください</h2>
                    <input type="file" name="anime_image_url" id="anime_image_input">
                    <img id="anime_image_preview">
                </div>
                
                <div class="eyecatch">
                    <h2>アイキャッチ用画像</h2>
                    <p>※横長の画像を推奨</p>
                    <input type="file" name="eyecatch_url" id="eyecatch_input">
                    <img id="eyecatch_preview">
                    <p class="input__error" style="color:red">{{ $errors->first('eyecatch_url') }}</p>
                </div>
                
                <div class="work">
                    <h2>作品タグ選択</h2>
                    <select name="post[work_id]">
                        <option>作品タグを選択</option>
                        @foreach($works as $work)
                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <input type="submit" class="btn btn-rose-outline" value="保存"/>
            </form>
        </div>
    
</x-app-layout>