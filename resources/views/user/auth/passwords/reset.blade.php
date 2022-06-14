@extends('layouts.user.app')

@section('content')
<div class="c-container p-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">パスワード 更新</h2>
    </div>

    <div class="c-form__container">
        <p>新しいパスワードを入力してください</p>
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('user.password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                                <input id="email" type="hidden" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

            <div class="c-form__control">
                <label for="email" class="c-form__label">パスワード</label>

                <div class="c-form__inputContainer">
                    <input id="password" type="password" class="c-form__input"
                        name="password" required autocomplete="new password">

                    @error('password')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="email" class="c-form__label">パスワード（再入力）</label>

                <div class="c-form__inputContainer">
                    <input id="password-confirm" type="password" class="c-form__input"
                        name="password_confirmation" required autocomplete="new password">
                </div>
            </div>

            <div class="c-form__buttonArea">
                <button type="submit" class="c-button__default">
                    パスワード更新
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
