@extends('layouts.shop.app')

@section('content')
<div class="c-container p-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">商品登録 --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('shop.product.store') }}" enctype='multipart/form-data'>
            @csrf
            <div class="c-form__control">
                <label for="name" class="c-form__label">商品名</label>

                <div class="c-form__inputContainer">
                    <input id="name" type="text" class="c-form__input  @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name">

                    @error('name')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="category_id" class="c-form__label">商品カテゴリー</label>

                <div class="c-form__inputContainer">
                    <select name="category_id" id="category_id"
                        class="c-form__select @error('category_id') is-invalid @enderror">
                        <option value="" class="c-form__option">選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="c-form__option" @if(old('category_id')==$category->
                            id)
                            selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="price" class="c-form__label">価格</label>

                <div class="c-form__inputContainer">
                    <input id="price" type="number" class="c-form__inputNumber  @error('price') is-invalid @enderror"
                        name="price" value="{{ old('price') }}" required autocomplete="price">
                    円
                    @error('price')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="image" class="c-form__label">画像</label>
                {{-- TODO 編集.ファイルをアップロード　アップロード時、バリデーション、アップロードの際にストレージに保存。axios --}}
                <div class="c-form__inputContainer">
                    <preview-image 
                        @error('image')
                        :invalid='@json('is-invalid')'
                        @enderror
                    ></preview-image>
                    @error('image')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="expired_at" class="c-form__label">消費期限</label>
                <div class="c-form__inputContainer">
                    <input id="expired_at" type="datetime-local" class="c-form__input @error('expired_at') is-invalid @enderror"
                        name="expired_at" value="{{ old('expired_at') }}" required autocomplete="expired_at">
                    @error('expired_at')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__buttonArea">
                <button type="submit" class="c-button__default">
                    商品登録
                </button>
            </div>
        </form>
    </div>
</div>
@endsection