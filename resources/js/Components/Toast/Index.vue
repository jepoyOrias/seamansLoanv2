<template>
    <div v-if="isToastOpen && props.toast" class="max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 fixed  bottom-[20px] end-[30px] z-40"
        role="alert">
        <div class="flex p-4">
            <div class="flex-shrink-0">
                <span v-html="props.toast.icon"></span>
            </div>
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">
                    {{ props.toast.title }}
                </h3>
                <p class="text-sm text-gray-700 dark:text-gray-400 mt-5">
                    {{ props.toast.message }}
                </p>
                <div class="mt-4">
                    <div :class="{'gap-3': props.toast.confirmButton && props.toast.cancelButton}" class="flex">
                        <button type="button"
                            @click.prevent="props.toast.onClickConfirm"
                            class="inline-flex items-center text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-blue-800 dark:text-blue-500 dark:focus:text-blue-400">
                          {{ props.toast.confirmButton }}
                        </button>
                        <button type="button"
                            v-if="props.toast.showCancelButton"
                            @click.prevent="props.toast.onClickCancel"
                            class="inline-flex items-center  me-0 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-blue-800 dark:text-blue-500 dark:focus:text-blue-400">
                            {{props.toast.cancelButton}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { watchEffect,ref,watch} from "vue";

const props = defineProps({
    toast: {
        type: Object,
        default: {},
    }

});


const isToastOpen =  ref(true);

watchEffect(()=>{
    if(props.toast) {
        isToastOpen.value = true;
        setTimeout(()=>{
            isToastOpen.value = false;
        }, 5000);
    }
})

</script>

<style lang="scss" scoped></style>