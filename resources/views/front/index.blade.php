@extends('layouts.app')
@section('content')

<div class="c-container">
    <div class="c-container__2column">
        <div class="c-article__container">
            <div class="p-lpImageArea__container">
                <img src={{asset("/storage/uploads/products/image/top.png")}} alt="トップ画像">
                <div class="p-lpImageArea__textContainer">
                    <h1 class="p-lpImageArea__text">
                        haiki share
                    </h1>
                </div>
            </div>

        </div>
        <div class="c-article__container">
            <div class="c-article__textContainer">
                <h2 class="c-article__title">フードロスを減らす</h2>
                <p class="c-article__text">
                    毎年522万トン、毎日10トントラック1430台分廃棄される食品*。
                    <br>
                    haiki shareは、消費者がフードロス削減に協力できる機会を提供するプラットフォームです。
                    <br><small>*https://www.no-foodloss.caa.go.jp/whats.html</small>
                </p>
            </div>
        </div>
    </div>
    <div class="c-container">
        <div class="c-content__header">
        </div>
        <div class="c-content__area">
            <div class="c-content__1column">
                <h2 class="c-content__title">
                    手順1：買いたい商品を検索する
                </h2>
                <p class="c-content__text">検索条件を入力し、買いたい商品を探しましょう。<br>都道府県、値段、賞味期限で商品を調べることができます。</p>
            </div>
            <div class="c-content__1column">
                <h2 class="c-content__title">
                    手順2：商品を購入
                </h2>
                <p class="c-content__text">買いたい商品があれば、購入ボタンをクリックすることで購入できます。<br><small>*会員登録をしていない場合、会員登録が必要になります。</small></p>

            </div>
            <div class="c-content__1column">
                <h2 class="c-content__title">
                    手順3：商品を取りに行く
                </h2>
                <p class="c-content__text">買った商品をコンビニが取り置きしておいてくれます。<br>商品を直接取りにいきましょう。<br>*支払いは受け取りの際に店舗で行ってください。</p>
            </div>
        </div>
    </div>
    <div class="c-container">
        <div class="c-content__linkList">
            <h2 class="c-content__title">
                早速商品を購入してみましょう！
            </h2>
            <div class="c-list__wraper p-mypage__listWraper">
                <ul class="c-list__group">
                    <li class="c-list__item">
                        <a class="arrow" href="{{ route('product.index') }}">商品一覧へ</a>
                    </li>
                    <li class="c-list__item">
                        <a class="arrow" href="{{ route('user.register') }}">会員登録はこちら</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="c-container">
        <div class="c-content__linkList">
            <h2 class="c-content__title">
                コンビニの方はこちらから
            </h2>
            <div class="c-list__wraper p-mypage__listWraper">
                <ul class="c-list__group">
                    <li class="c-list__item">
                        <a class="arrow" href="{{ route('shop.register') }}">コンビニ側会員登録</a>
                    </li>
                    <li class="c-list__item">
                        <a class="arrow" href="{{ route('shop.login') }}">コンビニ側ログイン</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection