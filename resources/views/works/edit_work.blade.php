<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>作品編集</title>
    </x-slot>
        <div class="container">
            <!--見出し-->
            <div class="row">
                <div class="box-rose">
                    <h1 class="fs-1 fw-lighter text-center">作品タグ編集</h1>
                    <!--管理人のみの削除機能-->
                    @if(Auth::check() === true)
                        @if(Auth::user()->administrator === 1)
                            <form action="/works/{{ $work->id }}" id="form_{{ $work->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-rose-outline" type="button" onclick="deleteWork({{ $work->id }})">
                                    <i class="fa-solid fa-trash-can me-1"></i>削除
                                </button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
            
            <div class="container-fluid">
                <!--作品タグ登録フォーム-->
                <form action="/works/{{ $work->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="work_name" class="fs-4 fw-light">作品名</label>
                        <input id="work_name" class="input-rose-custom" type="text" name="work[name]" value="{{ $work->name }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('work.name') }}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="work_introduction" class="fs-4 fw-lighter">作品説明</label>
                        <textarea id="work_introduction" class="input-rose-custom" style="resize: none" rows="5" name="work[introduction]">{{ $work->introduction }}</textarea>
                        <p class="introduction__error" style="color:red">{{ $errors->first('work.introduction') }}</p>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <input type="submit" class="btn btn-rose-outline" value="更新"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
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