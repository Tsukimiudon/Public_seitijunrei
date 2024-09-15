<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <mata name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $post->title }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </x-slot>
    
    <div class="container-fluid">
    <div class="card card-rose">
    
        <!--アイキャッチ-->
        <img class="card-img-top" style="height: 50%" src="{{ $post->eyecatch_url }}" alt="画像が読み込めません。">
        <div class="card-img-overlay">
            <h1 class="title">
                {{ $post->title }}
            </h1>
        </div>
        <div class="container">
        @if(Auth::id() === $post->user_id)
            <div class="edit">
                <a class="btn btn-rose-outline" href="/posts/{{ $post->id }}/edit">投稿の編集はこちら</a>
            </div>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-rose-outline" type="button" onclick="deletePost({{ $post->id }})">投稿を削除</button> 
            </form>
        @endif
        <div class="information">
            <small>投稿者：<a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></small>
            <small>投稿日：{{ $post->created_at }}</small>
            @if(!$post->updated_at == null)
                <small>更新日：{{ $post->updated_at }}</small>
            @endif
        </div>
        <div class="body">
            <p>{!! nl2br(htmlspecialchars($post->body)) !!}</p>
        </div>
        
        
        <!--写真-->
        <div class="container">
        <div class="row">
        @foreach($post->places as $place)
                <h2>{{ $place->name }}</h2>
                <p>{{ $place->caption }}</p>
        @endforeach
        </div>
        <div class="photo row">
            @foreach($post->images as $image)
                <img src="{{ $image->real_image_url }}">
                @if($image->anime_image_url)
                <img src="{{ $image->anime_image_url }}" alt="画像が読み込めません。">
                @endif
            @endforeach
        </div>
        </div>
        
        <!--Googleマップ-->
        <div class="container">
        <div class="row">
            <div class="col-12">
                <!--マップの表示部分-->
                <div id="map" style="height:500px"></div>
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
        
        <div class="row">
            <!--作品タグ-->     
            <a href="/works/{{ $post->work->id }}" class="btn btn-rose-tag">{{ $post->work->name }}</a>
            
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
                        <button class="btn btn-rose-outline">ブックマーク済<i class="fa-solid fa-star"></i></button>
                    </form>
                    @endif
                    @endif
            </div>
        </div>
        
        </div>
        </div>
        </div>
</x-app-layout>