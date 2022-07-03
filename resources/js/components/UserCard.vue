<template>
<div>
    <div class="c-content__imageContainer">
        <img
            v-if="product.image !== ''"
            class="c-content__image"
            :src='imagePath'
            :alt='product.name'
        >
        <img
            v-else
            class="c-content__image"
            :src='noImagePath'
            alt="noimage"
        >
    </div>
    <div class="c-content__body">
        <p class="c-content__text">
            {{shop.name}}:{{shop.branch_name}}</p>
        <p class="c-content__text">{{product.name}}</p>
        <p class="c-content__text">¥{{product.price}}<span class="tag" v-if="product.user_id != null">購入済み</span></p>
        <p class="c-content__text">賞味期限：{{expiredAt}}</p>
        <div class="c-content__buttonArea">
            <a :href="endpointDetail"
                class="c-button__default">
                詳細
            </a>
            <button
                :form="cancelFormId"
                type="submit"
                :href="endpointCancel"
                class="c-button__default--cancel"
                v-if="product.user_id == authUser && product.receive_flg == 0"
            >
                キャンセル
            </button>
            <button
                :form="purchaseFormId"
                type="submit"
                :href="endpointParchase"
                class="c-button__default"
                v-if="product.user_id == null && shopLoginFlg == false"
                onclick="return confirm('購入しますか？')"
            >
                商品購入
            </button>
            <button
                type="submit"
                :href="endpointReceive"
                v-if="product.receive_flg == 1"
                class="c-button__default--gray"
                disabled
            >受取済</button>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props: {
        product: {
            type: Array,
            default: [],
        },
        shop: {
            type: Array,
            default: [],
        },
        authUserId: {
            type: String,
            default: ''
        },
        endpointDetail: {
            type: String,
            default: [],
        },
        endpointEdit: {
            type: String,
            default: [],
        },
        endpointPurchase: {
            type: String,
            default: [],
        },
        imageSrc: {
            type: String,
            default: '',
        },
        shopLoginFlg: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {
            product: this.product,
            shop: this.shop,
            authUserId: this.authUserId,
            endpointDetail: this.endpointDetail,
            endpointEdit: this.endpointEdit,
            endpointPurchase: this.endpointPurchase,
            cancelFormId: 'cancel' + this.product.id,
            purchaseFormId: 'purchase' + this.product.id,
            imagePath: this.imageSrc + '/' + this.product.image,
            noImagePath: this.imageSrc + '/image/noimage.jpeg',
            shopLoginFlg: this.shopLoginFlg,
        }
    },
    methods: {
        
    },
    computed: {
        authUser() {
            // ログインしていないユーザーにゲストという文字列付与
            let auth = this.authUserId;
            if(this.authUserId == null) {
                auth = 'guest';
            }
            return auth;
        },
        expiredAt() {
            let date = this.product.expired_at;
            date = date.slice(6);
            date = date.slice(0, -3);
            date = date.replace('-', '/');
            return date;
        }
    }
}
</script>
