@extends('layouts.user.app')
@section('content')
<div class="c-container" style="text-align: center">
    <div class="c-pageTitle__container">
        <h2 class="c-pageTitle__text">退会</h2>
    </div>

    <div class="c-form__container">
        <form method="POST" action="{{ route('user.mypage.withdraw') }}">
            @csrf

            <div class="c-form__control">
                <button
                    type="submit"
                    class="c-button__default--alert"
                    onclick="return confirm('本当に退会しますか？')"
                    @if(!$withdrawFlg)
                    disabled
                    @endif
                >
                    退会する
                </button>
            </div>
        </form>
        <div class="c-form__control">
            <p>*商品の受け取りが完了していない場合、退会できません。</p>
        </div>
    </div>
</div>
@endsection