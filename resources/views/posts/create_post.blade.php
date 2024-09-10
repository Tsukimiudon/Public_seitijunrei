<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>投稿作成</title>
    </x-slot>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="title">
                <h2>タイトルを入力してください</h2>
                <input type="text" name="post[title]" placeholder="タイトルを入力してください。" value="{{ old('post.title') }}"/>
                <p class="input__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <div class="body">
                <h2>本文を入力してください</h2>
                <textarea name="post[body]" placeholder="本文を入力してください。">{{ old('post.body') }}</textarea>
                <p class="input__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
            <div class="place">
                <h2>聖地についての情報を入力してください</h2>
                <input type="text" name="place[name]" placeholder="聖地の名前を入力してください。" value="{{ old('place.name') }}"/>
                <p class="input__error" style="color:red">{{ $errors->first('place.name') }}</p>
                <input type="text" name="place[caption]" placeholder="聖地の情報を入力してください。" value="{{ old('place.caption') }}"/>
                <p class="input__error" style="color:red">{{ $errors->first('place.caption') }}</p>
                <input type="text" name="place[address]" placeholder="聖地の住所を入力してください。" value="{{ old('place.address') }}"/>
                <p class="input__error" style="color:red">{{ $errors->first('place.address') }}</p>
            </div>
            
            <div class="real_image">
                <h2>聖地の写真をアップロードしてください</h2>
                <input type="file" name="real_image_url">
                <p class="input__error" style="color:red">{{ $errors->first('real_image_url') }}</p>
            </div>
            
            <div class="anime_image">
                <h2>聖地に関連するイラストなどをアップロードしてください</h2>
                <input type="file" name="anime_image_url">
            </div>
            
            <div class="eyecatch">
                <h2>アイキャッチ用画像のアップロード</h2>
                <p>※横長の画像を推奨</p>
                <input type="file" name="eyecatch_url">
                <p class="input__error" style="color:red">{{ $errors->first('eyecatch_url') }}</p>
            </div>
            
            <div class="work">
                <h2>作品タグ選択</h2>
                <select name="post[work_id]">
                    @foreach($works as $work)
                    <option value="{{ $work->id }}">{{ $work->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="保存"/>
        </form>

</x-app-layout>