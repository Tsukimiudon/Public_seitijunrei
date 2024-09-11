<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        
        <div class="posts">
            @foreach($posts as $post)
                <article class="post">
                    <!--アイキャッチ-->
                    <div class="eyecatch">
                        <figure class="eyecatch_url"><img class="w-1/3" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。"></figure>
                    </div>
                    
                    <!--ブログの中身-->
                    <div class="content">
                        <!--タイトル-->
                        <h2 class="title">
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                    </div>
                    <div class="information">
                        <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                        <small>投稿日：{{ $post->created_at }}</small>
                    </div>
                    
                    <!--作品タグ-->
                    <a href="/works/{{ $post->work->id }}">{{ $post->work->name }}</a>
                    
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
                </article>
            @endforeach
        </div>
        
        <div class="paginate">
            {{ $posts->links() }}
        </div>
</x-app-layout>