<template>
    <Modal v-model:isOpen="ModalisOpen">
        <div
            class="modal-body max-h-[80vh] hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all lg:max-w-lg w-full  h-100  m-3 sm:mx-auto lg:min-w-[800px]">
            <div class="bg-white border  border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end items-center py-3 px-4  dark:border-gray-700">
                    <button type="button" @click="handleCloseClick"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"><span
                            class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                  
                </div>

                        <div class="p-4 sm:p-10 text-center overflow-y-auto">
                        <!-- Icon -->
                        <span class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full">
                            <span v-html="props.confirmationModal.icon"></span>
                        </span>
                        <!-- End Icon -->

                        <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
                          <div v-html="props.confirmationModal.title "></div>
                        </h3>
                        <p class="text-gray-500">
                            {{ props.confirmationModal.message }}
                        </p>

                        <div class="mt-6 flex justify-center gap-x-4">
                        <button  @click.prevent="props.confirmationModal.onClickConfirm"  class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800" href="#">
                            <span v-html="props.confirmationModal.confirmButton "></span>
                        </button>
                        <button 
                        v-if="props.confirmationModal.showCancelButton"
                        @click.prevent="props.confirmationModal.onClickCancel"
                        type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-sign-out-alert">
                         {{props.confirmationModal.cancelButton}}
                        </button>
                        </div>
                    </div>
                    </div>
            </div>
    </Modal>
</template>

<script setup>
import Modal from "./Index.vue"
const ModalisOpen = defineModel('isConfirmationModalOpen');


const props = defineProps({
    confirmationModal: {
        type: Object,
        default: {}
    }
})

const emit = defineEmits(['onCloseModal']);

const handleCloseClick = () => {
    emit('onCloseModal', true);



}


</script>

<style lang="scss" scoped></style>