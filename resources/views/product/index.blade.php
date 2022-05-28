@extends('layouts.user.app')
@section('content')
<div class="c-container p-show__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">商品一覧</h2>
    </div>

    <div class="c-list__wraper p-show__listWraper">
        <ul class="c-list__group">
            @if(Auth::check())
            <li class="c-list__item">
                <a class="arrow" href="{{ route('user.mypage.edit',['mypage' => Auth::id()]) }}">ユーザ情報の編集</a>
            </li>
            @endif
        </ul>
    </div>

    <div class="p-show__showSellProduct">
        <div class="c-content__header">
            <h3 class="c-content__title">商品一覧</h3>
        </div>
        <div class="c-content__area">
            <div class="p-show__gridWrapper">
                @foreach ($products as $product)
                <div class="c-content__card">
                    <user-card
                        :product='@json($product)'
                        :shop='@json($product->shop)'
                        :auth-user-id='@json(Auth::id())'
                        endpoint-detail='{{ route('product.detail', ['product'=> $product->id]) }}'
                        endpoint-purchase='{{ route('user.product.purchase', ['product'=> $product->id]) }}'
                        {{-- endpoint-edit='{{ route('user.product.edit', ['product' => $product->id]) }}' --}}
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
            </div>
        </div>
    </div>
    {{ $products->links() }}

</div>





@endsection