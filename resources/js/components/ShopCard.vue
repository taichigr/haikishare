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
        <p class="c-content__text">¥{{product.price}} <span class="tag" v-if="product.user_id != null">購入済み</span></p>
        <p class="c-content__text" v-if="purchaser.name">購入者:{{purchaser.name}}</p>
        <br v-else>


        <div class="c-content__buttonArea">
            <a :href="endpointDetail"
                class="c-button__default">
                詳細
            </a>
            <a :href="endpointEdit" v-if="product.user_id == null"
                class="c-button__default">
                編集
            </a>
            <button
                style="padding: 0 4px;font-size: 12px;"
                :form="receiveFormId"
                type="submit"
                v-if="product.user_id !== null && product.receive_flg == 0"
                class="c-button__default--receive"
                @click="showReceivedMessage"
            >
                受け取り完了
            </button>
            <button
                type="submit"
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
        purchaser: {
            type: Array,
            default: [],
        },
        endpointDetail: {
            type: String,
            default: '',
        },
        endpointEdit: {
            type: String,
            default: '',
        },
        endpointReceive: {
            type: String,
            default: '',
        },
        imageSrc: {
            type: String,
            default: '',
        }
    },
    data() {
        return {
            product: this.product,
            shop: this.shop,
            purchaser: this.purchaser,
            endpointDetail: this.endpointDetail,
            endpointEdit: this.endpointEdit,
            endpointReceive: this.endpointReceive,
            receiveFormId: 'receive' + this.product.id,
            imagePath: this.imageSrc + '/' + this.product.image,
            noImagePath: this.imageSrc + '/image/noimage.jpeg',
        }
    },
    methods: {
        showReceivedMessage() {
            confirm('受取済にしますか？購入者：'+ this.purchaser.name);
        }
    }
}
</script>
