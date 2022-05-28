@extends('layouts.user.app')
@section('content')
<div class="c-container p-mypage__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">購入した商品一覧</h2>
    </div>

    <div class="p-mypage__showSellProduct">
        <h3 class="c-content__title">購入した商品一覧</h3>
        <div class="c-content__area">
            <div class="p-mypage__gridWrapper">
                @foreach ($products as $product)
                <div class="c-content__card">
                <user-card
                        :product='@json($product)'
                        :shop='@json($product->shop)'
                        :auth-user-id='@json(Auth::id())'
                        endpoint-detail='{{ route('product.detail', ['product'=> $product->id]) }}'
                        endpoint-edit='{{ route('user.product.cancel', ['product' => $product->id]) }}'
                    ></user-card>
                    <form
                        id="cancel"
                        method="post"
                        action="{{ route('user.product.cancel') }}"
                    >
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>


@endsection