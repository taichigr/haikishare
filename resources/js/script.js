$(function() {
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