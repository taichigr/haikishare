@extends('layouts.shop.app')

@section('content')
<div class="c-container p-auth__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">商品編集 --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        @if($product->user_id == null)
        <form id="update" method="POST" action="{{ route('shop.product.update', ['product' => $product->id]) }}"
            enctype='multipart/form-data'>
            @method('PATCH')
            @csrf
            @endif
            <div class="c-form__control">
                <label for="name" class="c-form__label">商品名</label>

                <div class="c-form__inputContainer">
                    <input id="name" type="text" class="c-form__input  @error('name') is-invalid @enderror" name="name"
                        value="{{ $product->name ?? old('name') }}" required autocomplete="name" @if($product->user_id
                    !==
                    null) readonly @endif>

                    @error('name')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="category_id" class="c-form__label">商品カテゴリー</label>

                <div class="c-form__inputContainer">
                    <select name="category_id" id="category_id"
                        class="c-form__select @error('name') is-invalid @enderror" @if($product->user_id !==
                        null) disabled @endif>
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

                    @error('category_id')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__control">
                <label for="price" class="c-form__label">価格</label>

                <div class="c-form__inputContainer">
                    <input id="price" type="number" class="c-form__inputNumber  @error('price') is-invalid @enderror"
                        name="price" value="{{ $product->price ?? old('price') }}" required autocomplete="price"
                        @if($product->user_id !==
                    null) readonly @endif>
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
                    <input id="image" type="file" class="c-form__input  @error('image') is-invalid @enderror"
                        name="image" value="{{ $product->image ?? old('image') }}" autocomplete="image"
                        @if($product->user_id
                    !==
                    null) disabled @endif>
                    @error('image')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            @if($product->user_id == null)
        </form>
        @endif

        <div class="c-form__buttonArea">
            @if($product->user_id !== null)
            *商品が購入されたため、編集・削除ができません。
            @else
            <button form="delete" type="submit" class="c-button__default--alert" onclick="return confirm('本当に削除しますか？')">
                商品削除
            </button>
            <button form="update" type="submit" class="c-button__default">
                編集完了
            </button>
            <form id="delete" method="POST" action="{{route('shop.product.destroy', ['product' => $product->id])}}">
                @method('DELETE')
                @csrf
            </form>
            @endif
        </div>
    </div>
</div>
@endsection