<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お気に入り一覧') }}
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
                        <!--本文の一部-->
                        <p class="body">{{ $post->body }}</p>
                    </div>
                    <!--ブックマーク-->
                    <div class="post-control">
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
                    </div>
                </article>
            @endforeach
        </div>
        
        <div class="paginate">
            {{ $posts->links() }}
        </div>
</x-app-layout>