@extends('layouts.shop.app')
@section('content')
<div class="c-container p-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">会員登録 --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('shop.register') }}">
            @csrf

            <div class="c-form__control">
                <label for="shop_name" class="c-form__label">コンビニ名</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <input id="shop_name" type="text" class="c-form__input  @error('shop_name') is-invalid @enderror"
                        name="shop_name" value="{{ old('shop_name') }}" required autocomplete="shop_name" autofocus>
                    @error('shop_name')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="branch_name" class="c-form__label">支店名</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <input id="branch_name" type="text"
                        class="c-form__input  @error('branch_name') is-invalid @enderror" name="branch_name"
                        value="{{ old('branch_name') }}" required autocomplete="branch_name" autofocus>

                    @error('branch_name')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="prefecture_id" class="c-form__label">都道府県</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <select name="prefecture_id" class="c-form__select @error('address') is-invalid @enderror" required>
                        @foreach (config('pref') as $pref_id => $name)
                        <option value="{{ $pref_id }}" @if(old('prefecture_id')==$pref_id) selected @endif>{{ $name }}
                        </option>
                        @endforeach
                    </select>
                    @error('prefecture_id')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>
            <div class="c-form__control">
                <label for="address" class="c-form__label">都道府県以降の住所</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <input id="address" type="text" class="c-form__input  @error('address') is-invalid @enderror"
                        name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                    @error('address')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="email" class="c-form__label">メールアドレス</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <input id="email" type="email" class="c-form__input  @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="password" class="c-form__label">パスワード</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <small class="c-form__notification">*半角英数字８字以上で入力してください</small>
                    <input id="password" type="password" class="c-form__input  @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="password-confirm" class="c-form__label">パスワード(確認)</label>
                <small class="c-form__notification">*必須</small>
                <div class="c-form__inputContainer">
                    <input id="password-confirm" type="password" class="c-form__input " name="password_confirmation"
                        required autocomplete="new-password">
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