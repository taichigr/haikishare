<header class="l-header">
    <nav class="p-menu">
        <div class="p-menu__logoContainer">
            <a class="" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="p-menu__listContainer">
            <!-- Right Side Of Navbar -->
            <ul class="p-menu__listGroup">
                <!-- Authentication Links -->
                @unless (Auth::guard('shop')->check())
                <li class="p-menu__listItem">
                    <a @if(url()->current() == route('shop.login')) class="is-active" @endif href="{{ route('shop.login') }}">ログイン</a>
                </li>
                @if (Route::has('shop.register'))
                <li class="p-menu__listItem">
                    <a @if(url()->current() == route('shop.register')) class="is-active" @endif href="{{ route('shop.register') }}">新規登録</a>
                </li>
                @endif
                @else
                <li class="p-menu__listItem">
                    <a @if(url()->current() == route('shop.mypage.index')) class="is-active" @endif href="{{ route('shop.mypage.index') }}">マイページ</a>
                </li>
                <li class="p-menu__listItem">
                    <a class="" href="{{ route('shop.logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('shop.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endunless
            </ul>
        </div>
    </nav>
    
</header>