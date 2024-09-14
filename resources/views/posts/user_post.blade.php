<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <h1>{{ $user->name }}の投稿一覧</h1>
        <p>自己紹介：{{ $user->introduction }}</p>
        
        <!--特定の作品タグ-->
        <div class="posts">
            @foreach($user->posts as $post)
                <div class="post">
                <div>
                    <figure class="eyecatch_url"><img class="w-1/3" src="{{ $post->eyecatch_url }}"></figure>
                </div>
                <div class="content">
                    <h2 class="title">
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <small>投稿日：{{ $post->created_at }}</small>
                    <p class="body">{{ $post->body }}</p>
                </div>
                <!--ブックマーク-->
                <div class="post-control">
                    @if(Auth::check() ===true)
                    @if (!Auth::user()->is_bookmark($post->id))
                    <form action="{{ route('store_bookmark', $post) }}" method="POST">
                        @csrf
                        <button class="btn btn-rose-outline">ブックマーク<i class="fa-regular fa-star"></i></button>
                    </form>
                    @else
                    <form action="{{ route('delete_bookmark', $post) }}" method="POST">
                        @csrf
                        @method('delete')
                        <<button class="btn btn-rose-outline">ブックマーク済<i class="fa-solid fa-star"></i></button>
                    </form>
                    @endif
                    @endif
                </div>
                </div>
            @endforeach
        </div>
        
        <!--ページネーション-->
        <div class="paginate">
            {{ $users->links() }}
        </div>
</x-app-layout>