<template>
    <div>
        <img :src="ReceivedImagePath" v-if="ReceivedImagePath !== ''">
        <img :src="newImagePath" v-if="newImagePath !== ''">
        <input 
            id="image"
            type="file"
            :class="inputClass"
            name="image"
            value=""
            accept="image/*"
            @change="onFileChange($event)"
            >
    </div>
</template>
<script>
export default {
    props: {
        imagePath: {
            type: String,
            default: '',
        },
        isInvalid: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            ReceivedImagePath: this.imagePath,
            newImagePath: '',
            isInvalid: this.invalid,
        }
    },
    methods: {
        onFileChange(e) {
            // 画像データの読み込み
            const files = e.target.files;
            if(files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.newImagePath = e.target.result;
                };
                reader.readAsDataURL(file);
                this.ReceivedImagePath = '';
                console.log(this.formId)
            }
        },
    },
    computed: {
        inputClass() {
            if(this.isInvalid) {
                return 'c-form__input is-invalid';
            } else {
                return 'c-form__input';
            }
        }
    }
}
</script>