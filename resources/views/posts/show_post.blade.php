<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <mata name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $post->title }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </x-slot>
    <div class="container-fluid mt-3">
        
        <div class="row mb-3">
            <h1 class="title fs-1 fw-lighter">
                {{ $post->title }}
            </h1>
        </div>
        
        <div class="row mb-3">
            <div class="col-12 col-md-8">
                <div class="information">
                    <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
                    <small>投稿日：{{ $create_date }}</small>
                    @if($post->updated_at)
                        <small>更新日：{{ $update_date }}</small>
                    @endif
                </div>
            </div>
            @if(Auth::id() === $post->user_id)
                <div class="col-12 col-md-4 d-flex justify-content-end">
                    <div class="me-2">
                        <a class="btn btn-rose-outline" href="/posts/{{ $post->id }}/edit">
                            <i class="fa-solid fa-pen me-1"></i>編集
                        </a>
                    </div>
                    <div>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-rose-outline" type="button" onclick="deletePost({{ $post->id }})">
                                <i class="fa-solid fa-trash-can me-1"></i>削除
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="row mb-3">
            <p class="fs-5">{!! nl2br(htmlspecialchars($post->body)) !!}</p>
        </div>
        
        
        <!--写真-->
        <div class="card card-rose mb-3">
            <div class="card-body">
                <div class="row">
                    <h3 class="fs-4">写真</h3>
                </div>
                <div class="row">
                    <p class="fs-5">
                        @foreach($post->places as $place)
                            {{ $place->caption }}
                        @endforeach
                    </p>
                </div>
                <div class="row">
                    @foreach($post->images as $image)
                        @if($image->anime_image_url)
                            <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
                                <div class="image-container">
                                    <img src="{{ $image->real_image_url }}" alt="画像が読み込めません。" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
                                <div class="image-container">
                                    <img src="{{ $image->anime_image_url }}" alt="画像が読み込めません。" class="img-fluid">
                                </div>
                            </div>
                        @else
                            <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
                                <div class="image-container">
                                    <img src="{{ $image->real_image_url }}" alt="画像が読み込めません。" class="img-fluid">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        
        <!--Googleマップ-->
            <!--マップの表示部分-->
        <div class="card card-rose">
            <div class="card-body">
                <div class="row mb-2">
                    <h3 class="fs-4">
                        @foreach($post->places as $place)
                            {{ $place->name }}の地図
                        @endforeach
                    </h3>
                </div>
                <div class="row">
                    <div id="map" style="height:500px">
                        <script>
                            function initMap() {
                                map = document.getElementById("map");
                                
                                // placesテーブルの緯度、経度を変数に入れる
                                @foreach($post->places as $place)
                                    let seiti = {lat: {{ $place->latitude }}, lng: {{ $place->longitude }}};
                                @endforeach
                                
                                // オプションの設定
                                opt = {
                                    // 地図の縮尺を指定
                                    zoom: 13,
                                    // センターを聖地に指定
                                    center: seiti,
                                };
            
                                // 地図のインスタンスを作成（第一引数にはマップを描画する領域、第二引数にはオプションを指定）
                                mapObj = new google.maps.Map(map, opt);
                                marker = new google.maps.Marker({
                                    // ピンを差す位置を聖地に設定
                                    position: seiti,
                                    // ピンを差すマップを指定
                                    map: mapObj,
                                    // ホバーしたときに聖地の名前が表示されるように指定
                                    @foreach($post->places as $place)
                                        title: "{{ $place->name }}",
                                    @endforeach
                                });
                            }
                        </script>
                        <!-- Google Maps APIの読み込み（keyには自分のAPI_KEYを指定）-->
                        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ $api_key }}&callback=initMap" async defer></script>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-12 col-md-6">
                <div class="d-flex align-items-center">
                    <!--作品タグ-->
                    <a href="/works/{{ $post->work->id }}" class="btn btn-rose-tag me-2">{{ $post->work->name }}</a>
                    
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
                            <button class="btn btn-rose-outline"><i class="fa-solid fa-star"></i></button>
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            
            <!--SNS共有リンク-->
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <div class="d-flex justify-content-md-end">
                    <!--X,Twitter-->
                    <a
                      href="http://twitter.com/share?url=seitijunrei-e7caafaf0e25.herokuapp.com/posts/{{ $post->id }}&hashtags=LTBlog"
                      target="_blank"
                      rel="nofollow noopener noreferrer"
                      class="btn btn-rose-outline me-2"
                      >Xで共有
                     </a>
                    <!--Facebook-->
                    <a
                      href="http://www.facebook.com/share.php?u=seitijunrei-e7caafaf0e25.herokuapp.com/posts/{{ $post->id }}"
                      target="_blank"
                      rel="nofollow noopener noreferrer"
                      class="btn btn-rose-outline me-2"
                      >Facebookで共有</a>
                    <!-- line -->
                    <a
                      href="https://social-plugins.line.me/lineit/share?url=seitijunrei-e7caafaf0e25.herokuapp.com/posts/{{ $post->id }}"
                      target="_blank"
                      rel="nofollow noopener noreferrer"
                      class="btn btn-rose-outline"
                      >LINEで送る</a>
                </div>
            </div>
        </div>
    </div>
    
    <!--投稿とコメントの区切り-->
    <div class="container mt-5">
        <hr class="hr-rose">
    </div>
    
    <!--コメント欄-->
    <div class="container-fluid">
        <!--コメントを表示する-->
        @forelse($post->comments as $comment)
        <div class="row my-3">
            <div class="row mb-3">
                <h2 class="fs-4">コメント欄</h2>
            </div>
            <div class="row">
                <div class="box-rose mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fs-5 mb-0">{{ $comment->user->name }}</h4>
                            @if(Auth::id() === $comment->user->id)
                            <form action="{{ route('delete_comment', $comment->id) }}" id="form_{{ $comment->id }}" method="POST" onsubmit="return confirm('削除すると復元できません。\n本当に削除しますか？');">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="fa-solid fa-trash-can me-1"></i></button> 
                            </form>
                            @endif
                        </div>
                        <p class="mt-2 mb-0 fs-5">{{ $comment->body }}</p>
                </div>
            </div>
        </div>
        @empty
        @endforelse
        
        <!--コメントを投稿する-->
        <div class="row m-3">
            @auth
                <h3 class="fs-4">コメントを投稿する</h3>
                <form class="input-rose" id="new_comment" action="{{ route('store_comment', $post->id) }}" accept-charset="UTF-8" method="post">
                    @csrf
                    <input value="{{ $post->id }}" type="hidden" name="post_id" />
                    <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="body" required />
                    <button type="submit" class="btn btn-rose-outline">送信</button>
                </form>
            @else
                <h3 class="fs-4 text-center">ログインするとコメントを投稿することができます。</h3>
            @endauth
        </div>
    </div>

</x-app-layout>