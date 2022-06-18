<template>
    <div class="twitter_share">
        <button @click="twitterShare">ツイッターでシェアする</button>
    </div>
</template>

<script>
export default {
    methods:{
        twitterShare(){
           //シェアする画面を設定
            var shareURL = 'https://twitter.com/intent/tweet?text=' + "ツイッターシェアボタンのサンプルコード" + "%20%23あめねこサンプルコード集" + '&url=' + "https://code.ameneko.com/twitter-share";  
           //シェア用の画面へ移行
            location.href = shareURL
        }
    }
}
</script>