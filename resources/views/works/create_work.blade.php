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
            
            <div class="container-fluid">
                <!--作品タグ登録フォーム-->
                <form action="/works" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="work_name" class="fs-4 fw-light">作品名</label>
                        <input id="work_name" class="input-rose-custom" type="text" name="work[name]" value="{{ old('work.name') }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('work.name') }}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="work_introduction" class="fs-4 fw-lighter">作品説明</label>
                        <textarea id="work_introduction" class="input-rose-custom" style="resize: none" rows="5" name="work[introduction]">{{ old('work.body') }}</textarea>
                        <p class="introduction__error" style="color:red">{{ $errors->first('work.introduction') }}</p>
                    </div>
                    <!--保存ボタン-->
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <input type="submit" class="btn btn-rose-outline" value="保存"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>