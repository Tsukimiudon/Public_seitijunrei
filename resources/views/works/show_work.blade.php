<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <h1>{{ $work->name }}の作品タグがついた投稿一覧</h1>
        <p>作品紹介：{{ $work->introduction }}</p>
        
        @if(Auth::check() === true)
            @if(Auth::user()->administrator === 1)
                <form action="/works/{{ $work->id }}" id="form_{{ $work->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteWork({{ $work->id }})">作品を削除</button> 
                </form>
            @endif
        @endif
        
        <!--特定の作品タグ-->
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-2 g-2">
            @foreach($work->posts as $post)
                <div class="col mb-6">
                        <article class="card card-rose mt-1">
                            <img class="card-img-top" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                    <small>投稿日：{{ $post->created_at }}</small>
                </div>
                </div>
                
                <!--ブックマーク-->
                <div class="post-control">
                    @if(Auth::check() === true)
                    @if (!Auth::user()->is_bookmark($post->id))
                    <form action="{{ route('store_bookmark', $post) }}" method="POST">
                        @csrf
                        <button class="btn btn-rose-outline">ブックマーク<i class="fa-regular fa-star"></i></button>
                    </form>
                    @else
                    <form action="{{ route('delete_bookmark', $post) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-rose-outline">ブックマーク済<i class="fa-solid fa-star"></i></button>
                    </form>
                    @endif
                    @endif
                </div>
                <!--詳細ボタン-->        
                <a href="/posts/{{ $post->id }}" class="btn btn-rose-outline mr-3">詳細</a>
            @endforeach
        </div>
        
        
        <!--ページネーション-->
        <div class="paginate">
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