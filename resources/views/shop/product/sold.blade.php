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
                <a class="c-content__link" href="{{ route('shop.product.edit', ['product' => $product->id]) }}">
                    <div class="c-content__card">
                        <div class="c-content__imageContainer">
                            @if($product->image !== '')
                            <img class="c-content__image" src="{{ asset('uploads/products/'.$product->image) }}"
                                alt="{{$product->name}}">
                            @else
                            <img class="c-content__image" src="{{ asset('uploads/products/noimage.jpeg') }}"
                                alt="noimage">
                            @endif
                        </div>
                        <div class="c-content__body">
                            <p class="c-content__text">
                                {{$product->shop->name}}:{{$product->shop->branch_name}}</p>
                            <p class="c-content__text">{{$product->name}}</p>
                            <p class="c-content__text">¥{{$product->price}}</p>
                        </div>
                    </div>
                </a>
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
<div style="background-color: red">
    <li class="c-list__item"><a href="">商品情報編集</a></li>
    <li class="c-list__item"><a href="">出品した商品の一覧表示</a></li>
    <li class="c-list__item"><a href="">購入された商品の一覧表示</a></li>
</div>


@endsection