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
                <h1 class="fs-1 fw-lighter text-center">管理権限付与</h1>
            </div>
        </div>
        
        <div class="container-fluid">
            <form method="post" action="/mypage/admin/store">
                @csrf
                @foreach($users as $user)
                    @if($user->id == 1)
                        <!--最初の管理人は表示しない-->
                    @else
                    <div class="row">
                        <div class="col">
                            <label>{{ $user->name }}<input type="checkbox" name="user[]" value="{{ $user->id }}"></label>
                        </div>
                    </div>
                    @endif
                    <input name="user[]" type="hidden" value="NULL回避用" />
                @endforeach
                
                <!--付与ボタン-->
                <div class="row">
                    <div class="col d-flex justify-content-end mb-3">
                        <input type="submit" class="btn btn-rose-outline" value="権限を付与する"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>