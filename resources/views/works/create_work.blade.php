<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>作品登録</title>
    </x-slot>
        <h1>作品登録画面</h1>
        <form action="/works" method="POST">
            @csrf
            <div class="title">
                <h2>作品名</h2>
                <input type="text" name="work[name]" placeholder="作品名を入力してください。" value="{{ old('work.name') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('work.name') }}</p>
            </div>
            <div class="introduction">
                <h2>作品説明</h2>
                <textarea name="work[introduction]" placeholder="作品について簡単に説明しよう！">{{ old('work.body') }}</textarea>
                <p class="introduction__error" style="color:red">{{ $errors->first('work.introduction') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
</x-app-layout>