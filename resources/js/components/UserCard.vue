<template>
<div>
    <div class="c-content__imageContainer">
        <img
            v-if="product.image !== ''"
            class="c-content__image"
            :src="'/uploads/products/' + product.image"
            :alt='product.name'
        >
        <img
            v-else
            class="c-content__image"
            :src="'/uploads/products/' + 'noimage.jpeg'"
            alt="noimage"
        >
    </div>
    <div class="c-content__body">
        <p class="c-content__text">
            {{shop.name}}:{{shop.branch_name}}</p>
        <p class="c-content__text">{{product.name}}</p>
        <p class="c-content__text">¥{{product.price}}<span class="tag" v-if="product.user_id != null">購入済み</span></p>
        <div class="c-content__buttonArea">
            <a :href="endpointDetail"
                class="c-button__default">
                詳細
            </a>
            <button
                :form="cancelFormId"
                type="submit"
                :href="endpointCancel"
                class="c-button__default--cancel" v-if="product.user_id == authUserId">
                キャンセル
            </button>
            <button
                :form="purchaseFormId"
                type="submit"
                :href="endpointParchase"
                class="c-button__default" v-if="product.user_id != authUserId">
                商品購入
            </button>
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
        }
    },
    methods: {
        
    },
    computed: {
        
    }
}
</script>
