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
        
        <div class="posts">
            @foreach($posts as $post)
                @if(Auth::id() === $post->user_id)
                    <article class="post">
                        <!--アイキャッチ-->
                        <div class="eyecatch">
                            <figure class="eyecatch_url"><img class="w-1/3" src="{{ $post->eyecatch_url }}"></figure>
                        </div>
                        
                        <!--ブログの中身-->
                        <div class="content">
                            <!--タイトル-->
                            <h2 class="title">
                                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </h2>
                        </div>
                        <div class="information">
                            <small>投稿者：{{ $post->user->name }}</small>
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
                @endif
            @endforeach
        </div>
        
        <div class="paginate">
            {{ $posts->links() }}
        </div>
</x-app-layout>