<nav x-data="{ open: false }" class="nav-bar-rose">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="navbar-brand" href="/top">
                        <img src="https://res.cloudinary.com/dqgf3g25t/image/upload/v1726244069/%E7%84%A1%E9%A1%8C27_20240913194924_czseqe.png" alt="logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('index_post')" :active="request()->routeIs('index_post')" style="text-decoration: none">
                        {{ __('投稿一覧') }}
                    </x-nav-link>
                    @if(Auth::check() === true)
                        <x-nav-link :href="route('create_post')" :active="request()->routeIs('create_post')" style="text-decoration: none">
                            {{ __('投稿作成') }}
                        </x-nav-link>
                    @endif
                    <x-nav-link :href="route('index_work')" :active="request()->routeIs('index_work')" style="text-decoration: none">
                        {{ __('作品タグ一覧') }}
                    </x-nav-link>
                    @if(Auth::check() === true)
                        <x-nav-link :href="route('create_work')" :active="request()->routeIs('create_work')" style="text-decoration: none">
                            {{ __('作品タグ作成') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>
            
                <div class="flex items-center ms-auto space-x-4">
                    <div class="flex items-center order-2">
                        <form action="{{ route('index_post') }}" method="GET">
                            <div class="search-box">
                                <input type="text" name="keyword" placeholder="検索ワード">
                                <button type="submit">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                
                @if(Auth::check() === true)
                    <div align="right" class="dropdown dropdown-mypage" style="background:#4f122b; color:white;">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="background:#4f122b;" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/mypage/posts">自分の投稿一覧</a>
                            <a class="dropdown-item" href="/mypage/bookmarks">お気に入り一覧</a>
                            <a class="dropdown-item" href="/profile">設定</a>
                            <div class="dropdown-divider" style="color:white"></div>
                            <form method="POST" action="{{ route('logout') }}" class="px-4 py-2">
                                @csrf
                                <button type="submit" class="dropdown-item">ログアウト</button>
                            </form>
                        </div>
                    </div>
                @endif
                @if(Auth::check() === false)
                    <div>
                        <a class="btn btn-sm btn-outline-light" href="/login">ログイン</a>
                    </div>
                    <div class="ms-2">
                        <a class="btn btn-sm btn-outline-light" href="/register">新規登録</a>
                    </div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index_post')" :active="request()->routeIs('index_post')" style="text-decoration: none">
                {{ __('投稿一覧') }}
            </x-responsive-nav-link>
            @if(Auth::check() === true)
                <x-responsive-nav-link :href="route('create_post')" :active="request()->routeIs('create_post')" style="text-decoration: none">
                    {{ __('投稿作成') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('index_work')" :active="request()->routeIs('index_work')" style="text-decoration: none">
                {{ __('作品タグ一覧') }}
            </x-responsive-nav-link>
            
            @if(Auth::check() === true)
                <x-responsive-nav-link :href="route('mypage_post')" style="text-decoration: none">
                    {{ __('自分の投稿一覧') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('mypage_bookmarks')" style="text-decoration: none">
                    {{ __('お気に入り一覧') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('profile.edit')" style="text-decoration: none">
                    {{ __('設定') }}
                </x-responsive-nav-link>
    
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" style="text-decoration: none">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
                
            @endif
            
            @if(Auth::check() === false)
                <x-responsive-nav-link :href="route('register')" style="text-decoration: none">
                    {{ __('新規登録') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('login')" style="text-decoration: none">
                    {{ __('ログイン') }}
                </x-responsive-nav-link>
            @endif
        </div>


        <!-- Responsive Settings Options -->
        @if(Auth::check() === true)
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                    <br>
                </div>
            </div>
        @endif
    </div>
</nav>