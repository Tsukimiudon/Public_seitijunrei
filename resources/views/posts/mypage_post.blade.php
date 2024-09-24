<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('自分の投稿一覧') }}
        </h2>
    </x-slot>
        <div class="container">
            <!--見出し-->
            <div class="row">
                <div class="box-rose">
                    <h1 class="fs-1 fw-lighter text-center">自分の投稿一覧</h1>
                </div>
            </div>
            
            <!--自分の投稿-->
            <div class="row row-cols-1 row-cols-md-2 g-2">
                @foreach($posts as $post)
                    @if(Auth::id() === $post->user_id)
                        <div class="col mb-6">
                            <article class="card card-rose mt-1">
                                <!--アイキャッチ-->
                                <img class="card-img-top" src="{{ $post->eyecatch_url }}">
                                
                                <!--ブログの中身-->
                                <div class="card-body">
                                    <!--タイトル-->
                                    <h2 class="card-title">{{ $post->title }}</h2>
                                    <div class="card-text">
                                        <small>投稿日：{{ $post->created_at }}</small>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col d-flex justify-content-between align-items-center">
                                        <!--編集ボタン-->
                                        <div class="edit">
                                            <a class="btn btn-rose-outline" href="/posts/{{ $post->id }}/edit"><i class="fa-solid fa-pen me-1"></i>編集</a>
                                        </div>
                                        
                                        <!--削除ボタン-->
                                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="ms-3">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-rose-outline" type="button" onclick="deletePost({{ $post->id }})"><i class="fa-solid fa-trash-can me-1"></i>削除</button> 
                                        </form>
                                        
                                        <!-- 詳細ボタン -->
                                        <a href="/posts/{{ $post->id }}" class="btn btn-rose-outline ms-auto">詳細</a>
                                    </div>
                                </div>
                                </div>
                            </article>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        
        
        <div class="paginate">
            {{ $posts->links() }}
        </div>
</x-app-layout>