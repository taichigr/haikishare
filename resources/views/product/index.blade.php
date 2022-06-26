@extends('layouts.user.app')
@section('content')
<div class="c-container p-show__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">商品一覧</h2>
    </div>

    <div class="c-form__container" style="width: 80%; text-align:center;margin: auto">
        <form method="GET" action="{{ route('product.index') }}">
            <div class="c-form__control">
                <label for="prefecture_id" class="c-form__label">都道府県</label>
                <div class="c-form__inputContainer">
                    <select name="prefecture_id" class="c-form__select @error('address') is-invalid @enderror">
                        @foreach (config('pref') as $id => $name)
                        <option value="{{ $id }}" @if(!empty($prefecture_id) && $prefecture_id == $id) selected @endif>{{ $name }}
                        </option>
                        @endforeach
                    </select>
                    @error('prefecture_id')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>
            <div class="c-form__control">
                <label for="price_id" class="c-form__label">価格</label>
                <div class="c-form__inputContainer">
                    <select name="price_id" class="c-form__select @error('price_id') is-invalid @enderror">
                        @foreach (config('price') as $id => $text)
                        <option value="{{ $id }}" @if(!empty($price_id) && $price_id == $id) selected @endif>{{ $text }}</option>
                        @endforeach
                    </select>
                    @error('price_id')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>
            <div class="c-form__control">
                賞味期限
                <div class="c-form__inputContainer">
                    <input type="radio" name="limit" id="limit-within" value="1" @if(!empty($limit) && $limit == 1) checked  @endif><label for="limit-within">期限内</label>
                    <input type="radio" name="limit" id="limit-over" value="2" @if(!empty($limit) && $limit == 2) checked  @endif><label for="limit-over">期限切れ</label>

                    @error('category_id')
                    @include('../../components/error_message')
                    @enderror
                </div>
            </div>

            <div class="c-form__buttonArea--search">
                <button type="submit" class="c-button__default">
                    商品検索
                </button>
            </div>
        </form>
    </div>

    <div class="p-show__showSellProduct">
        <div class="c-content__header">
            {{-- @if(!$products)
            <h3 class="c-content__title">商品一覧</h3>
            @endif --}}
        </div>
        <div class="c-content__area">
            <div class="p-show__gridWrapper">
                @if(!empty($products))
                    @foreach ($products as $product)
                    <div class="c-content__card">
                        <user-card
                            image-src='{{ asset('storage/uploads/products') }}'
                            :product='@json($product)'
                            :shop='@json($product->shop)'
                            :auth-user-id='@json(Auth::id())'
                            endpoint-detail='{{ route('product.detail', ['product'=> $product->id]) }}'
                            endpoint-purchase='{{ route('user.product.purchase', ['product'=> $product->id]) }}'
                        ></user-card>
                        <form
                            id="cancel{{$product->id}}"
                            method="post"
                            action="{{ route('user.product.cancel') }}"
                        >
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                        <form
                            id="purchase{{$product->id}}"
                            method="post"
                            action="{{ route('user.product.purchase') }}"
                        >
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @if (empty($prefecture_id) && empty($price_id) && empty($limit))
    {{ $products->links()}}
    @else
    {{
        $products->appends([
            'prefecture_id' => $prefecture_id,
            'price_id' => $price_id,
            'limit' => $limit,
        ])->links()
    }}
    @endif

</div>





@endsection