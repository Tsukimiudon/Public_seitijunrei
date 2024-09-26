<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <!--特定の作品タグ-->
        <div class="container">
            <div class="row">
                <div class="box-rose mt-5">
                    <h1 class="fs-1 fw-lighter text-center">{{ $work->name }}</h1>
                    <p class="fs-5 fw-lighter text-center">{{ $work->introduction }}</p>
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            @if(Auth::check() === true)
                                <div class="me-2">
                                    <a class="btn btn-rose-outline" href="/works/{{ $work->id }}/edit">
                                        <i class="fa-solid fa-pen me-1"></i>編集
                                    </a>
                                </div>
                                @if(Auth::user()->administrator === 1)
                                    <form action="/works/{{ $work->id }}" id="form_{{ $work->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteWork({{ $work->id }})">
                                            <i class="fa-solid fa-trash-can me-1"></i>削除
                                        </button> 
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            @if($worksWithPostCount->posts_count == 0)
                <div class="row">
                    <p class="fs-4 fw-lighter text-center">投稿はありません</p>
                </div>
            @endif
        
            <div class="row row-cols-1 row-cols-md-2 g-2">
                @foreach($work->posts as $post)
                    <div class="col mb-6">
                        <article class="card card-rose mt-1">
                            <!--アイキャッチ-->
                            <img class="card-img-top" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。">
                            
                            <!--ブログの中身-->
                            <div class="card-body">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <div class="card-text">
                                    <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                                    <small>投稿日：{{ $post->created_at }}</small>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col d-flex justify-content-between align-items-center">
                                        <!-- ブックマーク -->
                                        @if(Auth::check() === true)
                                            @if (!Auth::user()->is_bookmark($post->id))
                                                <form action="{{ route('store_bookmark', $post) }}" method="POST" class="d-inline ms-3">
                                                    @csrf
                                                    <button class="btn btn-rose-outline"><i class="fa-regular fa-star"></i></button>
                                                </form>
                                            @else
                                                <form action="{{ route('delete_bookmark', $post) }}" method="POST" class="d-inline ms-3">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-rose-outline"><i class="fa-solid fa-star"></i></button>
                                                </form>
                                            @endif
                                        @endif
                                        
                                        <!-- 詳細ボタン -->
                                        <a href="/posts/{{ $post->id }}" class="btn btn-rose-outline ms-auto">詳細</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!--ページネーション-->
        <div class="row">
            <div class="col d-flex justify-content-center mb-3">
                <div class="pagination-rose">
                    {{ $works->links() }}
                </div>
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