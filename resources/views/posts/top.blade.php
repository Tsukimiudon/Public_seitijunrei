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
        
        
        
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($posts as $post)
                    <div class="col mb-4">
                        <article class="card card-rose">
                            <!--アイキャッチ-->
                            <img class="card-img-top" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。">
                            <div class="card-body">
                                <!--タイトル-->
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <div class="card-text">
                                    <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                                    <small>投稿日：{{ $post->created_at }}</small>
                                </div>
                                <a href="/posts/{{ $post->id }}" class="btn btn-rose-outline btn-detail">詳細</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

</x-app-layout>