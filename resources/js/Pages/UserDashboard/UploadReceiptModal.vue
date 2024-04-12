<template>
    <Modal v-model:isOpen="ModalisOpen">
        <div
           class="modal-body hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all lg:max-w-lg w-full  m-3 sm:mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200">
                        Upload Receipt
                    </h3>
                    <button type="button"
                    @click="handleCloseClick"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                     ><span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-5 p-5">
                    <form>
                        <label for="file-input-medium" class="sr-only">Choose Receipt</label>
                        <input  @change="handleFileInput"
                        type="file" name="file-input-medium" id="file-input-medium" ref="fileInput" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                            file:bg-gray-50 file:border-0
                            file:me-4
                            file:py-3 file:px-4
                            dark:file:bg-gray-700 dark:file:text-gray-400">
                    </form>
                    <ProgressBar v-if="progressPercentage" :fileName="receipt?.name" :progress="progressPercentage" class="mt-5"/>
                    <button :disabled="progressPercentage" @click="submitReciept()" class="py-3 mt-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-yellow-500 text-white hover:bg-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="../docs/index.html">
                       Submit Receipt
                    </button>
                </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal/Index.vue';
import {ref,reactive, computed} from 'vue';
import {router} from '@inertiajs/vue3';
import ProgressBar from '@/Components/Progress/Index.vue';
import { defineEmits } from 'vue';
const ModalisOpen = defineModel('isOpen');
const emit = defineEmits(['onCloseModal']);
const receipt = ref(null);
const fileInput = ref(null);
const  progress = ref(null);
const props = defineProps({
    repaymentID: {
        type: Number || String,
        default: "",
    }
});


const progressPercentage = computed(()=>{
    return progress.value;
})

const handleCloseClick = ()=>{
    emit('onCloseClick', true);

}


const handleFileInput = () => {
  receipt.value = fileInput.value.files[0];
}

const submitReciept = ()=>{
    router.visit(route('store.receipt'), {
        method:'post',
        only:["loans"],
        data:{
         receipt: receipt.value,
         repayment_id: props.repaymentID
        },
        onProgress: (event)=>{
            progress.value = event;
        },
        onSuccess:()=>{
            emit('onCloseClick', true);
        }
        
    })
}
    



</script>
