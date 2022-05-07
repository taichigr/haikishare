@extends('layouts.shop.app')

@section('content')
<div class="c-auth__container">
    <div class="c-page-title__container">
        <h2 class="c-page-title__text">ログイン --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('shop.login') }}">
            @csrf
            <div class="c-form__control">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__inputContainer">
                    <input id="email" type="email" class="c-form__input  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="password" class="c-form__label">パスワード</label>

                <div class="c-form__inputContainer">
                    <input id="password" type="password" class="c-form__input  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <div class="c-form__inputContainer">
                    <input class="c-form__checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="c-form__checkboxLabel">
                        ログイン状態を保存
                    </label>
                </div>
            </div>

            <div class="c-form__buttonArea">
                <button type="submit" class="c-button__default">
                    ログイン
                </button>
            </div>
        </form>
    </div>
</div>
@endsection