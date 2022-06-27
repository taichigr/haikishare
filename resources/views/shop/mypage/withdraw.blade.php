@extends('layouts.shop.app')
@section('content')
<div class="c-container" style="text-align: center">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">退会 --コンビニ--</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('shop.mypage.withdraw') }}">
            @csrf

            <div class="c-form__control">
                <button
                    type="submit"
                    class="c-button__default--alert"
                    onclick="return confirm('本当に退会しますか？')"
                >
                    退会する
                </button>
            </div>
        </form>
    </div>
</div>
@endsection