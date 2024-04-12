<template>
    <Toast :toast="objToast" v-if="objToast" />

    <div class="overflow-hidden">
        <div>
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"
                            class=" flex align-center px-6 cursor-pointer py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase"
                            @click="sortBy('name')">
                            Name
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
                            Position</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Loan Amount</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Term in Months</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Phone Number</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Facebook Name / Link</th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Loan Status
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <template v-for="(loan, index) in tableData" :key="index">
                        <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                            <td @click="toggleAccordion(index)" class="ps-3 cursor-pointer">
                                <svg v-if="activeIndex == index" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-up dark:text-white">
                                    <polyline points="18 15 12 9 6 15" />
                                </svg>
                                <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down dark:text-white">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{
        loan.personal_information.firstname }} {{ loan.personal_information.middlename }} {{
        loan.personal_information.lastname }} {{ loan.personal_information.suffix }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{
        loan.personal_information.employer_information.position }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ new
        Intl.NumberFormat().format(loan.amount) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{
        loan.term_months
    }} mons.</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{
            loan.personal_information.phone_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{
        loan.personal_information.facebook_account_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs  bg-slate-100 dark:bg-yellow-500/70 dark:text-white text-yellow-600 font-black font-bold">{{
        loan.status.status }}</span>
                            </td>
                        </tr>
                        <tr v-show="activeIndex === index">
                            <td colspan="12" class="px-6 py-4 whitespace-nowrap">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                                                Term Month</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                                                Monthly Amortization</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                                                Due Date</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                                                Receipt</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(subItem, subIndex) in loan.repayments" :key="subIndex">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ subItem.term_month }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ subItem.amount }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ subItem.due_date }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <span v-if="!subItem.receipt" class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-white/[.1] text-white">N/A</span>
                                                <div class="hs-tooltip inline-block [--placement:bottom]" v-else>
                                                    <button type="button" @click="viewReceipt(subItem.receipt)"
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
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 flex gap-2">
                                                <div class="hs-tooltip inline-block [--placement:bottom]"  v-if="subItem.status_id !== 11">
                                                    <button type="button" @click="approvePayment(subItem)" 
                                                        class="hs-tooltip-toggle size-10 inline-flex justify-center items-center gap-2 rounded-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-yellow-500 dark:hover:border-white/[.1] dark:hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                                        </svg>

                                                        <span
                                                            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700"
                                                            role="tooltip">
                                                            Approve Receipt </span>
                                                    </button>
                                                </div>
                                                <div v-else>
                                                    Approved
                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <ViewReceipt v-model:viewImageIsOpen="viewImageIsOpen" :imgUrl="receiptImg"  v-if="receiptImg"/>
    </div>
</template>

<script setup>
// Import necessary functions and components
import { ref, computed } from 'vue';
import Toast from '@/Components/Toast/Index.vue';
import ViewReceipt from './ViewReceipt.vue';
import { router } from '@inertiajs/vue3';
const objToast = ref(null);
const sortColumn = ref('');
const sortDirection = ref('asc');
const activeIndex = ref(null);


const viewImageIsOpen = ref(false);
const receiptImg = ref("");

// Initialize page, loans, and other reactive variables
const tableData = defineModel('tableData', { default: [] });

const toggleAccordion = (index) => {
    activeIndex.value = activeIndex.value === index ? null : index;
}
const viewReceipt = (receipt)=>{
    viewImageIsOpen.value = true;
    receiptImg.value = receipt
}
const approvePayment = (payment)=>{
    router.post('approved-receipt',{
        only: ['loans'],
        data: {
            id: payment.id
        },
        onSuccess:(response)=>{
            console.log(response);
        },
        onError: (errors) =>{
            console.log(errors);
        }
    });
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







const toggleAllLoanSelection = (event) => {
    tableData.value.forEach(loan => {
        loan.checked = event.target.checked;
    });
};

// Computed property to check if all loans are selected
const areAllLoansSelected = computed(() => {
    return tableData.value.length > 0 && tableData.value.every(loan => loan.checked);
});


</script>

<style scoped>
/* Add your custom styles here */
.dropdownMobile {
    position: absolute !important;
    top: 0;
    right: 20px;
}
</style>