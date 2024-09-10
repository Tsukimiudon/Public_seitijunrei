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
                </article>
            @endforeach
        </div>
        
        <div class="paginate">
            {{ $posts->links() }}
        </div>
</x-app-layout>