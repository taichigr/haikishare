<template>
<div class="c-content__card">
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
        <p class="c-content__text">¥{{product.price}}</p>

        <p class="c-content__text" v-if="product.user_id != null">この商品は購入されました</p>

        <div class="c-content__buttonArea">
            <a :href="endpointDetail"
                class="c-button__default">
                詳細
            </a>
            <a :href="endpointEdit" v-if="product.user_id == null"
                class="c-button__default">
                編集
            </a>
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
        endpointDetail: {
            type: String,
            default: [],
        },
        endpointEdit: {
            type: String,
            default: [],
        },
    },
    data() {
        return {
            product: this.product,
            shop: this.shop,
            endpointDetail: this.endpointDetail,
            endpointEdit: this.endpointEdit,
        }
    },
    methods: {
        
    },
    computed: {
        
    }
}
</script>
