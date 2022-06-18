<header class="l-header">
    <nav class="p-menu">
        <div class="p-menu__logoContainer">
            <a class="" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="p-menu__menuButtonContainer">
            <button class="p-menu__button js-toggle-open" type="button">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
        {{-- <div class="" id=""> --}}
            {{-- </div> --}}
    </nav>
    <!-- Right Side Of Navbar -->
    <ul class="p-toggleMenu js-toggle-menu">
        <!-- Authentication Links -->
        @unless (Auth::guard('shop')->check())
        <li class="p-toggleMenu--item">
            <a class="" href="{{ route('shop.login') }}">ログイン</a>
        </li>
        @if (Route::has('shop.register'))
        <li class="p-toggleMenu__item">
            <a class="" href="{{ route('shop.register') }}">新規登録</a>
        </li>
        @endif
        @else
        <li class="p-toggleMenu__item">
            <a class="" href="{{ route('shop.mypage.index') }}">マイページ</a>
        </li>
        <li class="p-toggleMenu__item">
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
</header>