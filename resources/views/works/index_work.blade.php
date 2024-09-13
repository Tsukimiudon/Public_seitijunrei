<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <div class="container mt-2">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($works as $work)
                <div class="col my-3">
                        <div class="card card-rose">
                            <div class="card-body">
                                <!--タイトル（リンク付き）-->
                                <h1 class="card-title">{{ $work->name }}</h1>
                                
                                <!--作品紹介-->
                                <p class="card-text">作品紹介：{{ $work->introduction }}</p>
                                <a href="/works/{{ $work->id }}" class="btn btn-rose-outline">詳細</a>
                                
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
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
        
        <!--ページネーション-->
        <div class='pagination justify-content-center'>
            {{ $works->links() }}
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