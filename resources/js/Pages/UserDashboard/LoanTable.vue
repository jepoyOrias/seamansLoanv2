<template>
    <Toast :toast="objToast" v-if="objToast" />

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class=" flex align-center px-6 cursor-pointer py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase"
                            @click="sortBy('uuid')">
                            Reference ID
                            <svg v-if="sortDirection === 'asc'" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-arrow-up shrink-0 size-4">
                                <line x1="12" y1="19" x2="12" y2="5" />
                                <polyline points="5 12 12 5 19 12" />
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-down shrink-0 size-4">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <polyline points="19 12 12 19 5 12" />
                            </svg>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Released Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Amout</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr v-for="loan in tableData" :key="loan.id"
                        class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{ loan.uuid }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{ format(loan.updated_at, 'MMM dd yyyy') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{ loan.amount }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            <div class="hs-tooltip inline-block [--placement:bottom]">
                                <button type="button"
                                    @click="openRepayment(loan)"
                                    class="hs-tooltip-toggle size-10 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-yellow-500 dark:hover:border-white/[.1] dark:hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye shrink-0 size-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <span
                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700"
                                        role="tooltip">
                                      View your Payments
                                    </span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <RepaymentModalVue v-model:repaymentTableModalIsOpen="repaymentTableModalIsOpen" v-model:loan="loanWithRepayment"/>
        </div>
    </div>
</template>

<script setup>
import { format } from 'date-fns';
// Import necessary functions and components
import Dropdown from '@/Components/Dropdown/Index.vue';
import { ref, computed } from 'vue';
import Toast from '@/Components/Toast/Index.vue';
import RepaymentModalVue from './RepaymentModal.vue';
const loanWithRepayment = ref({});
const objToast = ref(null);
const sortColumn = ref('');
const sortDirection = ref('asc');
const repaymentTableModalIsOpen = ref(false);
// Initialize page, loans, and other reactive variables
const tableData = defineModel('tableData', { default: [] });

const openRepayment =(loan)=>{
    loanWithRepayment.value = loan;
    repaymentTableModalIsOpen.value = true;
}

const sortBy = (column) => {
    // Toggle sort direction if same column clicked again
    if (sortColumn.value === column) {
        sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortColumn.value = column;
        sortDirection.value = 'asc';
    }

    // Sort the tableData array based on selected column and direction
    tableData.value.sort((a, b) => {
        const valueA = a.personal_information[column];
        const valueB = b.personal_information[column];

        if (valueA < valueB) {
            return sortDirection.value === 'asc' ? -1 : 1;
        }
        if (valueA > valueB) {
            return sortDirection.value === 'asc' ? 1 : -1;
        }
        return 0;
    });
};



</script>

<style scoped>
/* Add your custom styles here */
.dropdownMobile {
    position: absolute !important;
    top: 0;
    right: 20px;
}
</style>