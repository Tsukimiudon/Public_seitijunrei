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
            
            <div class="container-fluid">
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!--タイトル-->
                    <div class="row mb-3">
                        <label for="post_title" class="fs-4 fw-lighter">タイトル</label>
                        <input id="post_title" class="input-rose-custom" type="text" name="post[title]" value="{{ old('post.title') }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('post.title') }}</p>
                    </div>
                    
                    <!--本文-->
                    <div class="row mb-3">
                        <label for="post_body" class="fs-4 fw-lighter">本文</label>
                        <textarea id="post_body" class="input-rose-custom" style="resize: none" rows="5" name="post[body]">{{ old('post.body') }}</textarea>
                        <p class="input__error" style="color:red">{{ $errors->first('post.body') }}</p>
                    </div>
                    
                    <!--聖地の名前-->
                    <div class="row mb-3">
                        <label for="place_name" class="fs-4 fw-lighter">聖地の名前</label>
                        <input id="place_name" class="input-rose-custom" type="text" name="place[name]" value="{{ old('place.name') }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('place.name') }}</p>
                    </div>
                    
                    <!--聖地の情報-->
                    <div class="row mb-3">
                        <label for="place_caption" class="fs-4 fw-lighter">聖地の情報</label>
                        <input id="place_caption" class="input-rose-custom" type="text" name="place[caption]" value="{{ old('place.caption') }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('place.caption') }}</p>
                    </div>
                    
                    <!--聖地の住所-->
                    <div class="row mb-3">
                        <label for="place_address" class="fs-4 fw-lighter">聖地の住所</label>
                        <input id="place_address" class="input-rose-custom" type="text" name="place[address]" value="{{ old('place.address') }}"/>
                        <p class="input__error" style="color:red">{{ $errors->first('place.address') }}</p>
                    </div>
                    
                    <!--聖地の写真-->
                    <div class="row mb-3">
                        <label for="real_image_input" class="fs-4 fw-lighter">聖地の写真をアップロード</label>
                        <input type="file" name="real_image_url" id="real_image_input" accept="image/*">
                        <img id="real_image_preview" class="preview">
                        <p class="input__error" style="color:red">{{ $errors->first('real_image_url') }}</p>
                    </div>
                    
                    <!--聖地に関するイラスト-->
                    <div class="row mb-3">
                        <label for="anime_image_input" class="fs-4 fw-lighter">聖地に関連するイラストなどをアップロード</label>
                        <input type="file" name="anime_image_url" id="anime_image_input" accept="image/*">
                        <img id="anime_image_preview" class="preview">
                    </div>
                    
                    <!--アイキャッチ用画像-->
                    <div class="row mb-3">
                        <label for="eyecatch_input" class="fs-4 fw-lighter">アイキャッチ用画像をアップロード</label>
                        <p class="fs-5 fw-lighter">※横長の画像を推奨</p>
                        <input type="file" name="eyecatch_url" id="eyecatch_input" accept="image/*">
                        <img id="eyecatch_preview" class="preview">
                        <p class="input__error" style="color:red">{{ $errors->first('eyecatch_url') }}</p>
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
                    
                    <!--保存ボタン-->
                    <div class="row">
                        <div class="col d-flex justify-content-end mb-3">
                            <input type="submit" class="btn btn-rose-outline" value="保存"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
</x-app-layout>