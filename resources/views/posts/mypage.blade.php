<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        
        <div class="user_information">
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->introduction }}</p>
        </div>
        
        
        <h2><a href="/mypage/posts">自分の投稿一覧</a></h2>
        <h2><a href="/mypage/bookmarks">お気に入り一覧</a></h2>
</x-app-layout>