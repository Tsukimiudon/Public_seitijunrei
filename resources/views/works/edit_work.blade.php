<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>作品編集</title>
    </x-slot>
        <h1>作品情報編集画面</h1>
        <form action="/works/{{ $work->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>作品名</h2>
                <input type="text" name="work[name]" placeholder="作品名を入力してください。" value="{{ $work->name }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('work.name') }}</p>
            </div>
            <div class="introduction">
                <h2>作品説明</h2>
                <textarea name="work[introduction]" placeholder="作品について簡単に説明しよう！">{{ $work->introduction }}</textarea>
                <p class="introduction__error" style="color:red">{{ $errors->first('work.introduction') }}</p>
            </div>
            <input type="submit" value="更新"/>
        </form>
</x-app-layout>