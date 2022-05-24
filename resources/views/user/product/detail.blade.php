@extends('layouts.user.app')
@section('content')
<div class="c-container p-mypage__container">

    <div class="c-container p-auth__container">
        <div class="c-pageTitle__container">
            <h2 class="c-pageTitle__text">商品詳細</h2>
            @if(!$product->user_id)
            <form method="post" action="{{ route('product.purchase') }}">
                @csrf
                <input name="product_id" type="hidden" value="{{$product->id}}">
                <div class="c-form__buttonArea">
                    <button type="submit" class="c-button__default" onclick="return confirm('購入しますか？')">
                        商品購入
                    </button>
                </div>
            </form>
            @endif
        </div>

        <div class="c-form__container">
            <div class="c-form__control">
                <label for="name" class="c-form__label">商品名</label>

                <div class="c-form__inputContainer">
                    <input id="name" type="text" class="c-form__input" name="name"
                        value="{{ $product->name ?? old('name') }}" required autocomplete="name" readonly>


                </div>
            </div>

            <div class="c-form__control">
                <label for="category_id" class="c-form__label">商品カテゴリー</label>

                <div class="c-form__inputContainer">
                    <select name="category_id" id="category_id" class="c-form__select" disabled>
                        <option value="" class="c-form__option">選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="c-form__option" @if($product->category_id ==
                            $category->id)
                            selected
                            @else
                            @if(old('category_id')==$category->id) selected @endif
                            @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>


                </div>
            </div>

            <div class="c-form__control">
                <label for="price" class="c-form__label">価格</label>

                <div class="c-form__inputContainer">
                    <input id="price" type="number" class="c-form__inputNumber" name="price"
                        value="{{ $product->price ?? old('price') }}" required autocomplete="price" readonly>
                    円

                </div>
            </div>

            <div class="c-form__control">
                <label for="image" class="c-form__label">画像</label>
                {{-- TODO 編集.ファイルをアップロード　アップロード時、バリデーション、アップロードの際にストレージに保存。axios --}}
                <div class="c-form__inputContainer">
                    @if($product->image)
                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{$product->name}}">
                    @else
                    画像は登録されていません
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection