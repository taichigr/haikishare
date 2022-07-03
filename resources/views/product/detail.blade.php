@extends('layouts.app')
@section('content')
<div class="c-container p-mypage__container">

    <div class="c-container p-auth__container">
        <div class="c-pageTitle__container">
            <h2 class="c-pageTitle__text">商品詳細</h2>
            <share-network
                network="twitter"
                url="{{ route('product.detail', ['product' => $product->id]) }}"
                title="haiki shareでフードロスを減らそう！
商品名：{{ $product->name }}
価格：{{ $product->price }}"
                hashtags="haikishare,コンビニ"
            >
                <button class="c-button__share u-color__twitter">
                    <i class="fa fa-twitter"></i> Twitterで商品をシェアする
                </button>
            </share-network>

            @if(!$product->user_id)
                @if(Auth::user('user'))
                    <form method="post" action="{{ route('user.product.purchase') }}">
                        @csrf
                        <input name="product_id" type="hidden" value="{{$product->id}}">
                        <div class="c-form__buttonArea">
                            <button type="submit" class="c-button__default" onclick="return confirm('購入しますか？')">
                                商品購入
                            </button>
                        </div>
                    </form>
                @else
                <p>購入にはログインが必要です</p>
                @endif
            @endif
            @if(Auth::user() && $product->user_id == Auth::user()->id)
            <form method="post" action="{{ route('user.product.cancel') }}">
                @csrf
                <input name="product_id" type="hidden" value="{{$product->id}}">
                <div class="c-form__buttonArea">
                    <button type="submit" class="c-button__default--cancel" onclick="return confirm('キャンセルしますか')">
                        キャンセル
                    </button>
                </div>
            </form>
            @endif
        </div>

        <div class="c-form__container">
            <div class="c-form__control">
                <label for="name" class="c-form__label">商品名</label>

                <div class="c-form__inputContainer">
                    <p>{{ $product->name ?? old('name') }}</p>

                </div>
            </div>

            <div class="c-form__control">
                <label for="category_id" class="c-form__label">商品カテゴリー</label>

                <div class="c-form__inputContainer">
                    @foreach ($categories as $category)
                        @if($product->category_id == $category->id)
                        <p>{{ $category->name }}</p>
                        @endif
                    @endforeach


                </div>
            </div>

            <div class="c-form__control">
                <label for="price" class="c-form__label">価格</label>

                <div class="c-form__inputContainer">
                    <p>{{$product->price}}</p>

                </div>
            </div>

            <div class="c-form__control">
                <label for="price" class="c-form__label">賞味期限</label>

                <div class="c-form__inputContainer">
                    <p>{{$product->expired_at}}</p>
                </div>
            </div>

            <div class="c-form__control">
                <div class="c-form__inputContainer">
                    @if($product->image)
                    <img src="{{ asset('storage/uploads/products/'.$product->image) }}" alt="{{$product->name}}">
                    @else
                    画像は登録されていません
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection