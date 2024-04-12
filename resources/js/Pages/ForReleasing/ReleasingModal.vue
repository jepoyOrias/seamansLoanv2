<template>
 <Toast :toast="objToast" v-if="objToast" />
    <Modal v-model:isOpen="ModalisOpen">
        <div
            class="modal-body hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all lg:max-w-lg w-full  m-3 sm:mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200">
                        Release and Create User
                    </h3>
                    <button type="button"
                    @click="ModalisOpen = false"
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
                        <div class="my-2">
                            <label for="input-label-with-helper-text"
                            class="block text-sm font-medium mb-2 dark:text-white">Amount</label>
                        <input type="text" id="input-label-with-helper-text"
                        v-model="loan.amount"
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="" aria-describedby="hs-input-helper-text">
                        </div>
                        <div class="my-2">
                            <label for="input-label-with-helper-text"
                            class="block text-sm font-medium mb-2 dark:text-white">Term months</label>
                        <input type="text" id="input-label-with-helper-text"
                        v-model="loan.term_months"
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="" aria-describedby="hs-input-helper-text">
                        </div>
                        <div class="my-2">
                            <label for="input-label-with-helper-text"
                            class="block text-sm font-medium mb-2 dark:text-white">Monthly Amortization</label>
                        <input type="text" id="input-label-with-helper-text"
                        v-model="loan.monthly_amortization"
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="" aria-describedby="hs-input-helper-text">
                        </div>
                        
                        <div class="flex my-4">
                            <input  v-model="loan.grace_period" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-checked-checkbox" >
                            <label for="hs-checked-checkbox" class="text-sm text-gray-500 ms-3 dark:text-gray-400">Has Grace Period</label>
                        </div>
                        <div class="flex justify-end">
                            <button :disabled="progressPercentage" @click.prevent="releaseAndCreateUser()" class=" ms-auto py-3 mt-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-yellow-500 text-white hover:bg-yellow-800 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                         Release and Create User
                        </button>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal/Index.vue';
import { defineEmits,ref } from 'vue';
import axios from 'axios';
import {router} from '@inertiajs/vue3';
import Toast from '@/Components/Toast/Index.vue';
const ModalisOpen = defineModel('isOpen');
const loan = defineModel('loan');
const objToast = ref(null);


const releaseAndCreateUser = ()=>{
    loan.value.start_date = new Date();
    loan.value.grace_period = loan.value?.grace_period ? loan.value?.grace_period : false;
    axios.post('/register', {
        loan : loan.value
    }).then(response=>{
        objToast.value = {
            title: 'Success',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
            message: `${loan.value.personal_information.lastname}, ${loan.value.personal_information.firstname}  account has been created and the loan amount is now released to the client`,
            cancelButton: 'Close',
            onClickCancel: () => { objToast.value = null },
        }
        ModalisOpen.value = false;
        refreshDashboardData();
    })
    .catch(errors=>{
        objToast.value = {
            title: 'Success',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
            message: errors.response?.error,
            cancelButton: 'Close',
            onClickCancel: () => { objToast.value = null },
        }
    })
}
const refreshDashboardData = () => {
  router.reload({ only: ['loans'] })
};



</script>
