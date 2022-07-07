<header class="l-header">
    <nav class="p-menu">
        <div class="p-menu__logoContainer">
            <a class="" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="p-menu__listContainer">
            <ul class="p-menu__listGroup">
                <!-- Authentication Links -->
                @unless (Auth::guard('user')->check())
                    <li class="p-menu__listItem">
                        <a @if(url()->current() == route('user.login')) class="is-active" @endif href="{{ route('user.login') }}">ログイン</a>
                    </li>
                    @if (Route::has('user.register'))
                        <li class="p-menu__listItem">
                            <a @if(url()->current() == route('user.register')) class="is-active" @endif href="{{ route('user.register') }}">新規登録</a>
                        </li>
                    @endif
                @else
                <li class="p-menu__listItem">
                    <a @if(url()->current() == route('user.mypage.index')) class="is-active" @endif href="{{ route('user.mypage.index') }}">マイページ</a>
                </li>
                @endunless
                <li class="p-menu__listItem">
                    <a @if(url()->current() == route('product.index')) class="is-active" @endif href="{{ route('product.index') }}">商品一覧</a>
                </li>
                @unless (!Auth::guard('user')->check())
                <li class="p-menu__listItem">
                    <div class="">
                        <a @if(url()->current() == route('user.logout')) class="is-active" @endif href="{{ route('user.logout') }}"
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
        </div>
    </nav>
</header>