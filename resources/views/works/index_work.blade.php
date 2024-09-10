<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        
        <!--作品登録機能へのリンク-->
        <a href="/works/create">作品登録はこちら</a>
        
        
        @foreach($works as $work)
        
        <!--タイトル（リンク付き）-->
        <h1><a href="/works/{{ $work->id }}">{{ $work->name }}</a></h1>
        
        <!--作品紹介-->
        <p>作品紹介：{{ $work->introduction }}</p>
        
        <!--管理人のみの削除機能-->
        @if(Auth::check() === true)
            @if(Auth::user()->administrator === 1)
                <form action="/works/{{ $work->id }}" id="form_{{ $work->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteWork({{ $work->id }})">作品を削除</button> 
                </form>
            @endif
        @endif
        
        @endforeach
        
        <!--ページネーション-->
        <div class='paginate'>
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