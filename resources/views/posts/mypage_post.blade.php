<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('自分の投稿一覧') }}
        </h2>
    </x-slot>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    自分の投稿一覧
                </h2>
            </div>
        </header>
        
        <div class="container mt-5">
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
                                        <div class="col">
                                            <!--作品タグ-->
                                            <a href="/works/{{ $post->work->id }}" class="btn btn-rose-tag ml-3">{{ $post->work->name }}</a>
                                        </div>
                                        <!--詳細ボタン-->
                                        <a href="/posts/{{ $post->id }}" class="btn btn-rose-outline mr-3">詳細</a>
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