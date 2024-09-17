<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
        <h1>作品タグ一覧</h1>
        <div class="container mt-2">
            <div class="card card-rose">
                <div class="card-body">
                <div class="row g-4">
                    @foreach($works as $work)
                        <!--タイトル（リンク付き）-->
                        <div class="col">
                        <a href="/works/{{ $work->id }}" class="btn btn-rose-tag">{{ $work->name }}</a>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
        
</x-app-layout>