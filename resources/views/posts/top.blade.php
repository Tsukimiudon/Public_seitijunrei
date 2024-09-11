<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <!-- ↓ スライドの外枠 -->
        <div class="slide-wrapper">
            <!--スライド -->
            <div id="slide" class="slide">
                <div>
                    <img src="https://res.cloudinary.com/dqgf3g25t/image/upload/v1725725248/PXL_20240329_074127783_ze2xzc.jpg">
                </div>
                <div>
                    <img src="https://res.cloudinary.com/dqgf3g25t/image/upload/v1725725180/PXL_20230907_102610662.MP_wddnsz.jpg">
                </div>
                <div>
                    <img src="https://res.cloudinary.com/dqgf3g25t/image/upload/v1725669194/PXL_20240223_012109828_hxa766.jpg">
                </div>
                <div>
                    <img src="https://res.cloudinary.com/dqgf3g25t/image/upload/v1725636805/PXL_20230918_050420128_igqvot.jpg">
                </div>
            </div>
            <!-- ↓ 左右のボタン -->
            <span id="prev" class="prev"></span>
            <span id="next" class="next"></span>
            <!-- ↓ インジケーター -->
            <ul class="indicator" id="indicator">
                <li class="list"></li>
                <li class="list"></li>
                <li class="list"></li>
                <li class="list"></li>
            </ul>
        </div>
        
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
        
        <script src="{{ asset('/js/style.js') }}"></script>
</x-app-layout>