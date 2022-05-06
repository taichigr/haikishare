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
        @unless (Auth::guard('user')->check())
            <li class="p-toggleMenu--item">
                <a class="" href="{{ route('user.login') }}">ログイン</a>
            </li>
            @if (Route::has('user.register'))
                <li class="p-toggleMenu__item">
                    <a class="" href="{{ route('user.register') }}">新規登録</a>
                </li>
            @endif
        @else
            <li class="p-toggleMenu__item">
                <a id="" class="" href="#" role="button">
                    {{ Auth::user()->name }} <span class=""></span>
                </a>
                <div class="">
                    <a class="" href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endunless
    </ul>
</header>