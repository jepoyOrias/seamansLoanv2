<template>
    <Modal v-model:isOpen="viewImageIsOpen" @click="viewImageIsOpen = false">
        <div>
            <div
                class="modal-body w-full hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <img :src="`../storage/${props.imgUrl}`" alt="">
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal/Index.vue';
const viewImageIsOpen = defineModel('viewImageIsOpen');
const props = defineProps({
    imgUrl: {
        type: String,
    }
});

</script>

<style scoped></style>