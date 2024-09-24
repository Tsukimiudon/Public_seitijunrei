<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('聖地巡礼アプリ') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <!--見出し-->
        <div class="row">
            <div class="box-rose">
                <h1 class="fs-1 fw-lighter text-center">作品タグ一覧</h1>
            </div>
        </div>
        
        <div class="card card-rose">
            <div class="card-body">
                <div class="row g-4">
                    @if($works->isEmpty())
                        <div class="col-12 text-center">
                            <p>作品タグはありません</p>
                        </div>
                    @else
                        @foreach($works as $work)
                            <div class="col-12 col-sm-6 col-md-4">
                                <a href="/works/{{ $work->id }}" class="btn btn-rose-tag d-block text-start">{{ $work->name }}</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>