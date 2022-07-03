@extends('layouts.shop.app')

@section('content')

<div class="c-container p-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">パスワード リセット --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        <p>メールのリンクからパスワードの再登録お願いいたします。</p>
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('shop.password.email') }}">
            @csrf
            <div class="c-form__control">
                <label for="email" class="c-form__label">メールアドレス</label>

                <div class="c-form__inputContainer">
                    <input id="email" type="email" class="c-form__input @error('email') is-invalid @enderror"
                        name="email" value="" required autocomplete="email">

                    @error('email')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__buttonArea">
                <button type="submit" class="c-button__default">
                    メール送信
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
