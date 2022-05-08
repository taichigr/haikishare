$(function() {

    // メニューボタン関連処理
    $('.js-toggle-open').on('click', function() {
        $text = $(this).children('span').text();
        if($text === 'menu') {
            $(this).children('span').text('close');
        } else {
            $(this).children('span').text('menu');
        }
        $('.js-toggle-menu').toggleClass('is-active');
    })
    // 関係のない箇所をクリックした際にメニュードロップダウンを閉じる
    $(document).on('click', function(event) {
        // 表示したポップアップ以外の部分をクリックしたとき
        if($('.js-toggle-menu').hasClass('is-active')) {
            if (!$(event.target).closest('.js-toggle-open').length) {
                $('.js-toggle-menu').toggleClass('is-active');
                $('.js-toggle-open').children('span').text('menu');
            }
        }
    });
    // ボタンの二重クリック防止
    $('.js-button-prevent-double').on('click', function() {
        $('.btn').prop('disabled', true);
    });

    // 画像の高さが足りないとき、footerを下部に固定
    const $ftr = $('footer');
  if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
    $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;' });
  }
});