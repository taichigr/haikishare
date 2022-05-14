@extends('layouts.shop.app')
@section('content')
<div class="c-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">会員登録 --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('shop.register') }}">
            @csrf

            <div class="c-form__control">
                <label for="name" class="c-form__label">コンビニ名</label>
                <div class="c-form__inputContainer">
                    <input id="name" type="text" class="c-form__input  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="name" class="c-form__label">支店名</label>
                <div class="c-form__inputContainer">
                    <input id="branch_name" type="text" class="c-form__input  @error('branch_name') is-invalid @enderror" name="branch_name" value="{{ old('branch_name') }}" required autocomplete="branch_name" autofocus>

                    @error('branch_name')
                        @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="name" class="c-form__label">都道府県</label>
                <div class="c-form__inputContainer">
                    <select name="prefecture_id" class="c-form__selectbox @error('address') is-invalid @enderror" required>
                        @foreach (config('pref') as $pref_id => $name)
                        <option value="{{ $pref_id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('prefecture_id')
                        @include('../../components/error_message')
                    @enderror
                </div>
            </div>
            <div class="c-form__control">
                <label for="name" class="c-form__label">都道府県以降の住所</label>
                <div class="c-form__inputContainer">
                    <input id="address" type="text" class="c-form__input  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                    @error('address')
                        @include('../../components/error_message')
                    @enderror
                </div>
            </div>

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
                <label for="password-confirm" class="c-form__label">パスワード(確認)</label>
                <div class="c-form__inputContainer">
                    <input id="password-confirm" type="password" class="c-form__input " name="password_confirmation" required autocomplete="new-password">
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