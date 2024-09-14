<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お気に入り一覧') }}
        </h2>
    </x-slot>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    お気に入り一覧
                </h2>
            </div>
        </header>
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
                            <button class="btn btn-rose-outline">ブックマーク<i class="fa-regular fa-star"></i></button>
                        </form>
                        @else
                        <form action="{{ route('delete_bookmark', $post) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-rose-outline">ブックマーク済<i class="fa-solid fa-star"></i></button>
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