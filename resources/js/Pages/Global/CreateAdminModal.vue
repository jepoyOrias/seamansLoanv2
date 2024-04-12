<template>
    <div>
        <Toast :toast="objToast" v-if="objToast" />
        <Modal v-model:isOpen="createAdminModal">
            <div
                class="modal-body hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto bg-white">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                        <h3 class="font-bold text-gray-800 dark:text-gray-200">
                            Create Admin
                        </h3>
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
                    <!-- Floating Input -->
                    <div class="mt-5 p-5">
                        <div class="relative mt-3">
                            <input type="text" v-model="admin.name" id="hs-floating-input-name-value"
                            :class="{
                             'peer py-3  px-4 block w-full border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-2 autofill:pb-2' : hasError,
                             'peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600  focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-2 autofill:pb-2' : !hasError}"
                               >
                            <label for="hs-floating-input-name-value" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Name</label>
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper" v-if="hasError">{{ hasError.errors.name }}</p>
                        </div>
                        <div class="relative mt-3">
                            <input type="email"  v-model="admin.email" id="hs-floating-input-email-value"
                            :class="{
                             'peer py-3 px-4 block w-full border-red-500 rounded-lg text-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-2 autofill:pb-2' : hasError,
                             'peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600  focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-2 autofill:pb-2' : !hasError}"
                              >
                                <label for="hs-floating-input-email-value" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                            peer-focus:text-xs
                            peer-focus:-translate-y-1.5
                            peer-focus:text-gray-500
                            peer-[:not(:placeholder-shown)]:text-xs
                            peer-[:not(:placeholder-shown)]:-translate-y-1.5
                            peer-[:not(:placeholder-shown)]:text-gray-500">Email</label>
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper" v-if="hasError">{{ hasError.errors.email }}</p>
                        </div>
                        <div class="flex justify-end gap-3 mt-5">
                            <button type="button"
                            @click="handleCloseClick"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                            <button type="button"
                                @click="createAdmin"
                                 class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                  >

                                <span v-if="isCreating" class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full" role="status" aria-label="loading"></span>

                                Create
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </Modal>
    </div>
</template>

<script setup>
import Modal from '@/Components/Modal/Index.vue';
import { ref, watchEffect } from 'vue';  
import axios from 'axios';
import Toast from '@/Components/Toast/Index.vue';
const objToast = ref(null);
const isCreating = ref(false);
const hasError = ref(null);
const admin = ref({
    name:'',
    email: '',
})

const handleCloseClick = () => {
    createAdminModal.value = false
}

watchEffect(()=>{
    console.log(hasError.value);
})

const createAdmin = () => {
    isCreating.value = true
    axios.post('/admin/register', admin.value)
        .then(response => {
            admin.value = {name: '', email: ''}
            createAdminModal.value = false;
                objToast.value = {
                    title: 'Success',
                    icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                    message: response.data.message
                }
             // handle success response
        })
        .catch(error => {
           hasError.value = error.response.data // handle error response
        })
        .finally(() => {
            isCreating.value = false; // regardless of success or failure, set isCreating back to false
        });
}



const createAdminModal = defineModel("createAdminModal", { default: false });
</script>

<style lang="scss" scoped></style>