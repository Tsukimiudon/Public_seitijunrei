<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background:#4f122b" data-bs-theme="dark">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="/top">
        <img src="https://res.cloudinary.com/dqgf3g25t/image/upload/v1726244069/%E7%84%A1%E9%A1%8C27_20240913194924_czseqe.png" alt="logo">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/posts/index">投稿一覧</a>
            </li>
            @if(Auth::check() === true)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/posts/create">投稿作成</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/works/index">作品タグ一覧</a>
            </li>
            @if(Auth::check() === true)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/works/create">作品タグ作成</a>
            </li>
            @endif
        </ul>
            
         <ul class="navbar-nav">
            @if(Auth::check() === true)
            <li class="nav-item dropdown dropdown-mypage" style="background:#4f122b" data-bs-theme="dark">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="background:#4f122b" data-bs-theme="dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/mypage/posts">自分の投稿一覧</a>
                    <a class="dropdown-item" href="/mypage/bookmarks">お気に入り一覧</a>
                    <a class="dropdown-item" href="/profile">設定</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" class="px-4 py-2">
                        @csrf
                        <button type="submit" class="dropdown-item">ログアウト</button>
                    </form>
                </div>
            </li>
            @endif
            
            @if(Auth::check() === false)
            <li class="nav-item">
                <a class="btn btn-sm btn-outline-light" href="/login">ログイン</a>
            </li>
            <li class="nav-item ml-2">
                <a class="btn btn-sm btn-outline-light" href="/register">アカウント作成</a>
            </li>
            @endif
        </ul>
    </div>
  </div>
</nav>