<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <h1>{{ $work->name }}の作品タグがついた投稿一覧</h1>
        <p>作品紹介：{{ $work->introduction }}</p>
        
        <div class="edit_work"><a href="/works/{{ $work->id }}/edit">作品情報の編集はこちら</a></div>
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
        <div class="posts">
            @foreach($work->posts as $post)
                <div class="post">
                <div>
                    <figure class="eyecatch_url"><img class="w-1/3" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。"></figure>
                </div>
                <div class="content">
                    <h2 class="title">
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                    <small>投稿日：{{ $post->created_at }}</small>
                    <p class="body">{{ $post->body }}</p>
                </div>
                </div>
                
                <!--ブックマーク-->
                <div class="post-control">
                    @if(Auth::check() ===true)
                    @if (!Auth::user()->is_bookmark($post->id))
                    <form action="{{ route('store_bookmark', $post) }}" method="POST">
                        @csrf
                        <button>お気に入り登録</button>
                    </form>
                    @else
                    <form action="{{ route('delete_bookmark', $post) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button>お気に入り解除</button>
                    </form>
                    @endif
                    @endif
                </div>
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