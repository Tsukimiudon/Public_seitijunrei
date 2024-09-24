<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>作品登録</title>
    </x-slot>
        <div class="container">
            <!--見出し-->
            <div class="row">
                <div class="box-rose">
                    <h1 class="fs-1 fw-lighter text-center">作品タグ作成</h1>
                </div>
            </div>
            
            <!--作品タグ登録フォーム-->
            <form action="/works" method="POST">
                @csrf
                <div class="title row">
                    <label for="work_name">作品名</label>
                    <input id="work_name" class="input-rose" type="text" name="work[name]" placeholder="作品名を入力してください。" value="{{ old('work.name') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('work.name') }}</p>
                </div>
                <div class="introduction row">
                    <label for="work_introduction">作品説明</label>
                    <textarea id="work_introduction" class="input-rose" name="work[introduction]" placeholder="作品について簡単に説明しよう！">{{ old('work.body') }}</textarea>
                    <p class="introduction__error" style="color:red">{{ $errors->first('work.introduction') }}</p>
                </div>
                <div class="row">
                    <input type="submit" class="btn btn-rose-outline ms-auto" value="保存"/>
                </div>
            </form>
        </div>
</x-app-layout>