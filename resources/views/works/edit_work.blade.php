<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>作品編集</title>
    </x-slot>
        <!--見出し-->
        <div class="row">
            <div class="box-rose">
                <h1 class="fs-1 fw-lighter text-center">作品タグ編集</h1>
            </div>
        </div>
         <!--管理人のみの削除機能-->
                                @if(Auth::check() === true)
                                    @if(Auth::user()->administrator === 1)
                                        <form action="/works/{{ $work->id }}" id="form_{{ $work->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="deleteWork({{ $work->id }})">作品を削除</button> 
                                        </form>
                                    @endif
                                @endif
                                
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
        
        <!--管理人のみの削除機能-->
        <script>
            function deleteWork(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
</x-app-layout>