@extends('layouts.user.app')
@section('content')
<div class="c-container p-mypage__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">マイページ</h2>
    </div>

    <div class="c-list__wraper p-mypage__listWraper">
        <ul class="c-list__group">
            <li class="c-list__item"><a class="arrow"
                    href="{{ route('user.mypage.edit',['mypage' => Auth::id()]) }}">ユーザ情報の編集</a></li>
        </ul>
    </div>

    <div class="p-mypage__showSellProduct">
        <div class="c-content__header">
            <h3 class="c-content__title">購入した商品</h3>
            <a class="c-content__headlink" href="{{ route('user.purchased.index') }}">
                <p class="c-content__headtext">全件表示</p>
            </a>
        </div>
        <div class="c-content__area">
            <div class="p-mypage__gridWrapper">
                @foreach ($products as $product)
                    <card
                        :product='@json($product)'
                        :shop='@json($product->shop)'
                        endpoint-detail='{{ route('shop.product.detail', ['product'=> $product->id]) }}'
                        endpoint-edit='{{ route('shop.product.edit', ['product' => $product->id]) }}'
                    ></card>
                @endforeach
            </div>
        </div>
    </div>





</div>





@endsection