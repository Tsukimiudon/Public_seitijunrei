<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        
      
        
        <div class="container mt-5">
            @if($keyword_value)
                <div class="row">
                    <div class="card card-rose">
                        <h2>「{{ $keyword }}」の検索結果一覧</h2>
                    </div>
                </div>
                @if($post_count == 0)
                    <p>検索結果に一致する投稿はありません</p>
                @endif
            @endif
            
            
            <div class="row row-cols-1 row-cols-md-2 g-2">
                @foreach($posts as $post)
                    <div class="col mb-6">
                        <article class="card card-rose mt-1">
                            <!--アイキャッチ-->
                            <img class="card-img-top" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。">
                            
                            <!--ブログの中身-->
                            <div class="card-body">
                                <!--タイトル-->
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <div class="card-text">
                                    <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                                    <small>投稿日：{{ $post->created_at }}</small>
                                </div>
                                <div class="row mt-3">
                                    <div class="col d-flex justify-content-between align-items-center">
                                        <!-- 作品タグ -->
                                        <a href="/works/{{ $post->work->id }}" class="btn btn-rose-tag">{{ $post->work->name }}</a>
                                        
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
        
        <div class="paginate paginate-rose">
            {{ $posts->links() }}
        </div>
</x-app-layout>