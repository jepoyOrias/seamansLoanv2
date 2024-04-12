<template>
    <div>
        <Modal v-model:isOpen="repaymentTableModalIsOpen">
        <div
            class="max-h-[80%] max-w-full z-[9999] min-w-[50%] overflow-hidden flex flex-col bg-white border mx-4 shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-gray-200">
                    Refence Number: {{ loan.uuid }}
                </h3>
                <button type="button"
                @click="repaymentTableModalIsOpen = false"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#hs-bg-gray-on-hover-cards"> <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Term #</th>
                                            <th scope="col"
                                                class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Due Date</th>
                                            <th scope="col"
                                                class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Amortization</th>
                                            <th scope="col"
                                                class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Status</th>
                                            <th scope="col"
                                                class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                Receipt</th>
                                            <th scope="col"
                                                class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                Upload Receipt</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <tr v-for="repayment in loan.repayments" :key="repayment.id">
                                            <td
                                                class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ repayment.term_month }}</td>
                                            <td
                                                class="px-2 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ format(repayment.due_date, 'MMM dd yyyy') }}</td>
                                            <td
                                                class="px-2 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ repayment.amount }}</td>
                                            <td
                                                class="px-2 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ repayment.status ? repayment.status.status : 'N/A' }}
                                            </td>
                                            <td
                                                class="px-2 max-w-[50px] text-center py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                <span v-if="!repayment.receipt" class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-white/[.1] text-white">N/A</span>
                                                <div class="hs-tooltip inline-block [--placement:bottom]" v-else>
                                                    <button type="button" @click="viewReceipt(repayment.receipt)"
                                                        class="max-w-[50px] hs-tooltip-toggle size-10 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-yellow-500 dark:hover:border-white/[.1] dark:hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image shrink-0 size-4"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                                        <span
                                                            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700"
                                                            role="tooltip">
                                                            View Receipt
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                            <td
                                                class="px-2 max-w-[50px] py-4 whitespace-nowrap text-sm text-center font-medium text-gray-800 dark:text-gray-200">
                                                <div class="hs-tooltip inline-block [--placement:bottom]">
                                                    <button type="button" @click="openUploadReceiptModal(repayment.id)"
                                                        class="max-w-[50px] hs-tooltip-toggle size-10 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-yellow-500 dark:hover:border-white/[.1] dark:hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-file-plus shrink-0 size-4">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                                            <polyline points="14 2 14 8 20 8" />
                                                            <line x1="12" y1="18" x2="12" y2="12" />
                                                            <line x1="9" y1="15" x2="15" y2="15" />
                                                        </svg>
                                                        <span
                                                            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700"
                                                            role="tooltip">
                                                            Upload Receipt
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Modal>
        <ViewReceipt v-model:viewImageIsOpen="viewImageIsOpen" :imgUrl="receiptImg"  v-if="receiptImg"/>
        <UploadReceiptModal v-model:isOpen="uploadResultModalIsOpen" :repaymentID="repaymentID" @onCloseClick="closeModal"/>
    </div>
   
</template>

<script setup>
import { format } from 'date-fns';
import { watchEffect, ref, computed } from 'vue';
import UploadReceiptModal from './UploadReceiptModal.vue';
import Modal from '@/Components/Modal/Index.vue'
import ViewReceipt from './ViewReceipt.vue';
const repaymentTableModalIsOpen = defineModel('repaymentTableModalIsOpen', { default: false });
const loan = defineModel('loan', { default:{}});
const repaymentID = ref(null);
const uploadResultModalIsOpen = ref(false);
const viewImageIsOpen = ref(false);
const receiptImg = ref("");

const openUploadReceiptModal = (repayment_id) => {
    uploadResultModalIsOpen.value = true;
    repaymentID.value = repayment_id;
    repaymentTableModalIsOpen.value = false;
}
const viewReceipt = (receipt)=>{
    viewImageIsOpen.value = true;
    receiptImg.value = receipt
}
const closeModal = (isClose)=>{
    uploadResultModalIsOpen.value = false;
    repaymentTableModalIsOpen.value = true;
}

</script>

<style lang="scss" scoped></style>