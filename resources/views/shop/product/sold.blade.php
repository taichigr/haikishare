@extends('layouts.shop.app')
@section('content')
<div class="c-container p-mypage__container">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">マイページ商品一覧（購入された商品） --コンビニ--</h2>
    </div>

    {{-- <div class="c-list__wraper p-mypage__listWraper">
        <ul class="c-list__group">
            <li class="c-list__item"><a class="arrow"
                    href="{{ route('shop.mypage.edit',['mypage' => Auth::id()]) }}">ユーザ情報の編集</a></li>
            <li class="c-list__item"><a class="arrow" href="{{ route('shop.product.create') }}">商品出品</a></li>
        </ul>
    </div> --}}
    {{-- {{ dd($products) }} --}}

    <div class="p-mypage__showSellProduct">
        <h3 class="c-content__title">購入された商品</h3>
        <div class="c-content__area">
            <div class="p-mypage__gridWrapper">
                @foreach ($products as $product)
                <div class="c-content__card">
                    <shop-card
                        :product='@json($product)'
                        :shop='@json($product->shop)'
                        endpoint-detail='{{ route('shop.product.detail', ['product'=> $product->id]) }}'
                        endpoint-edit='{{ route('shop.product.edit', ['product' => $product->id]) }}'
                    ></shop-card>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}

        </div>
    </div>




</div>


<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>


@endsection