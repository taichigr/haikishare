@extends('layouts.user.app')
@section('content')
<div class="c-container p-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">会員情報編集</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('user.mypage.update', ['mypage' => Auth::id()]) }}">
            @method('PATCH')
            @csrf

            <div class="c-form__control">
                <label for="name" class="c-form__label">名前</label>

                <div class="c-form__inputContainer">
                    <input id="name" type="text" class="c-form__input @error('name') is-invalid @enderror" name="name"
                        value="{{ $user->name ?? old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__inputContainer">
                    <input id="email" type="email" class="c-form__input @error('email') is-invalid @enderror"
                        name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email">

                    @error('email')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="password" class="c-form__label">パスワード</label>

                <div class="c-form__inputContainer">
                    <input id="password" type="password" class="c-form__input @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password">

                    @error('password')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="password-confirm" class="c-form__label">パスワード(確認)</label>

                <div class="c-form__inputContainer">
                    <input id="password-confirm" type="password" class="c-form__input" name="password_confirmation"
                        autocomplete="new-password">
                </div>
            </div>

            <div class="c-form__buttonArea">
                <button type="submit" class="c-button__default">
                    登録
                </button>
            </div>
        </form>
    </div>
</div>





@endsection