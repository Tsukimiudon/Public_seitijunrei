<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <mata name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $post->title }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </x-slot>
        
    <div class="container">    
        <h1 class="title">
            {{ $post->title }}
        </h1>
        @if(Auth::id() === $post->user_id)
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit">投稿の編集はこちら</a>
            </div>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">投稿を削除</button> 
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
        <div class="photo">
            @foreach($post->places as $place)
                <h3>{{ $place->name }}</h3>
                <p>{{ $place->caption }}</p>
            @endforeach
            @foreach($post->images as $image)
                <figure class="real_photo"><img class="col-xs-12 col-sm-6" src="{{ $image->real_image_url }}"></figure>
                @if($image->anime_image_url)
                    <figure class="anime_photo"><img class="col-xs-12 col-sm-6" src="{{ $image->anime_image_url }}" alt="画像が読み込めません。"></figure>
                @endif
            @endforeach
        </div>
        
        <!--Googleマップ-->
        <div class="place_map">
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
        
        <!--作品タグ-->
        <div class="tag">
            <a href="/works/{{ $post->work->id }}">{{ $post->work->name }}</a>
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
                <button class="btn btn-rose-outline">ブックマーク済<i class="fa-solid fa-star"></i></button>
            </form>
            @endif
            @endif
        </div>
        
        <!--フッター-->
        <div class="footer">
            <a href="/top">TOPページに戻る</a>
        </div>
        
        <script>
            function deletePost(id) 
            {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        </div>
</x-app-layout>