<template>
    <Toast :toast="objToast" v-if="objToast" />

    <div class="overflow-hidden">
        <div >
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="py-3 px-4 pe-0">
                            <div class="flex items-center h-5">
                                <input id="hs-table-pagination-checkbox-all" type="checkbox"
                                    v-model="areAllLoansSelected" @change="toggleAllLoanSelection($event)"
                                    class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                            </div>
                        </th>
                        <th scope="col"
                            class=" flex align-center px-6 cursor-pointer py-3 text-start text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase"
                            @click="sortBy('name')">
                            <div class="flex items-center">
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
                            </div>
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
                            Loan Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-yellow-500 uppercase">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr v-for="loan in tableData" :key="loan.id"
                        class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                        <td class="py-3 ps-4">
                            <div class="flex items-center h-5">
                                <input type="checkbox" :id="'hs-table-pagination-checkbox-' + loan.id"
                                    v-model="loan.checked"
                                    class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                <label :for="'hs-table-pagination-checkbox-' + loan.id" class="sr-only">Checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{
        loan.personal_information.firstname }} {{ loan.personal_information.middlename  }} {{ loan.personal_information.lastname  }} {{ loan.personal_information.suffix  }}</td>
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
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
// Import necessary functions and components
import Dropdown from '../../Components/Dropdown/Index.vue';
import { ref, computed } from 'vue';
import Toast from '@/Components/Toast/Index.vue';
const objToast = ref(null);
const sortColumn = ref('');
const sortDirection = ref('asc');

// Initialize page, loans, and other reactive variables
const tableData = defineModel('tableData', { default: [] });



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