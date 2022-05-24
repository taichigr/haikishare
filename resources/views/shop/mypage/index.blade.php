@extends('layouts.shop.app')
@section('content')
<div class="c-container p-mypage__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">マイページ --コンビニ--</h2>
    </div>

    <div class="c-list__wraper p-mypage__listWraper">
        <ul class="c-list__group">
            <li class="c-list__item"><a class="arrow"
                    href="{{ route('shop.mypage.edit',['mypage' => Auth::id()]) }}">ユーザ情報の編集</a></li>
            <li class="c-list__item"><a class="arrow" href="{{ route('shop.product.create') }}">商品出品</a></li>
        </ul>
    </div>

    <div class="p-mypage__showSellProduct">
        <div class="c-content__header">
            <h3 class="c-content__title">出品した商品</h3>
            <a class="c-content__headlink" href="{{ route('shop.sellIndex', ['shop' => Auth::id()]) }}">
                <p class="c-content__headtext">全件表示</p>
            </a>
        </div>
        <div class="c-content__area">
            <div class="p-mypage__gridWrapper">
                @foreach ($sellProducts as $product)
                    <shop-card
                        :product='@json($product)'
                        :shop='@json($product->shop)'
                        endpoint-detail='{{ route('shop.product.detail', ['product'=> $product->id]) }}'
                        endpoint-edit='{{ route('shop.product.edit', ['product' => $product->id]) }}'
                    ></shop-card>
                @endforeach
            </div>
        </div>
    </div>

    <div class="p-mypage__showSoldProduct">
        <div class="c-content__header">
            <h3 class="c-content__title">購入された商品</h3>
            <a class="c-content__headlink" href="{{ route('shop.soldIndex', ['shop' => Auth::id()]) }}">
                <p class="c-content__headtext">全件表示</p>
            </a>
        </div>
        <div class="c-content__area">
            <div class="p-mypage__gridWrapper">
                @foreach ($soldProducts as $product)
                <shop-card
                    :product='@json($product)'
                    :shop='@json($product->shop)'
                    endpoint-detail='{{ route('shop.product.detail', ['product'=> $product->id]) }}'
                ></shop-card>
                @endforeach
            </div>
        </div>
    </div>




</div>





@endsection