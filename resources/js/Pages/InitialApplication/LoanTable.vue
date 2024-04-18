<template>
    <Toast :toast="objToast" v-if="objToast" />

    <div class="overflow-hidden">
        <div>
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
                                <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-arrow-down shrink-0 size-4">
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
                                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs  bg-slate-100 dark:bg-yellow-500/70 dark:text-white text-yellow-600  font-bold">{{
                                loan.status.status }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                            <div class="px-6 py-1.5">
                                <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                    <button id="hs-table-dropdown-1" type="button"
                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700 hidden"
                                        aria-labelledby="hs-table-dropdown-1" style="">
                                        <div class="py-2 first:pt-0 last:pb-0">
                                            <button @click="generateRequirements($event, loan.personal_information)" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                href="#">
                                                Download Requirements
                                            </button>
                                        </div>
                                        <div class="py-2 first:pt-0 last:pb-0">
                                            <p class="text-start block py-2 px-3 text-xs font-medium uppercase dark:text-yellow-500 text-blue-900">
                                                Edit
                                            </p>
                                            <button class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                @click="editPersonalInfomation(loan)">
                                                 Personal Information
                                            </button>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                href="#">
                                                Employer's Information
                                            </a>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                href="#">
                                                Bank's Information
                                            </a>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                href="#">
                                                Co-Borrowers's Information
                                            </a>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                href="#">
                                                Requirements Information
                                            </a>
                                        </div>
                                        <div class="py-2 first:pt-0 last:pb-0">
                                           
                                            <button class="flex w-full items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                               @click="deleteLoanInformation(loan)">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <PersonalInformationModal v-model:personalInformationModal="personalInformationModal" :personalInformation="personalInformation" @on-close-modal="personalInformationModal = false"/>
        <ConfirmationModal :confirmationModal="confirmationModal" v-model:isConfirmationModalOpen="isConfirmationModalOpen"/>
    </div>
</template>

<script setup>
// Import necessary functions and components
import Dropdown from '../../Components/Dropdown/Index.vue';
import { ref, computed } from 'vue';
import Toast from '@/Components/Toast/Index.vue';
import { downloadZip } from '@/utility/downloadFile';
import { router } from '@inertiajs/vue3';
import ConfirmationModal from '@/Components/Modal/ConfirmationModal.vue';
import PersonalInformationModal from '@/Components/Apply/PersonalInformationModal.vue';
const objToast = ref(null);
const sortColumn = ref('');
const sortDirection = ref('asc');

const confirmationModal = ref(null);
const isConfirmationModalOpen = ref(false);
// Initialize page, loans, and other reactive variables
const tableData = defineModel('tableData', { default: [] });
const personalInformationModal = ref(false);
const personalInformation = ref({});

const editPersonalInfomation = (loan) =>{
    personalInformation.value = loan.personal_information;
    personalInformationModal.value = true;
}


const deleteLoanInformation  = (loan)=>{
    isConfirmationModalOpen.value = true;
    confirmationModal.value = {
                title: 'Delete Confirmation',
                icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>',
                message: "Are you sure You want to delete this Loan Information and the  corresponding information of it? Once you've done it you can't revert it back",
                showCancelButton:true,
                cancelButton: 'Cancel',
                onClickCancel: () => { objToast.value = null },
                onClickConfirm: (e) => { 
                    confirmationModal.value.confirmButton = `
                    <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>`
                    axios.delete(`loans/${loan.id}`)
                    .then(response => {
                            confirmationModal.value = null;
                            isConfirmationModalOpen.value = false;
                            objToast.value = {
                                title: 'Success',
                                icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                                message: response.data.message,
                                showCancelButton:false,
                                onClickConfirm: (e) => { objToast.value = null },
                                confirmButton: 'Close'
                            }

                        }).catch(error => console.log(error));
                        refreshDashboardData();


                 },
                confirmButton: 'Delete'
    }

   
}

const refreshDashboardData = () => {
  router.reload({ only: ['loans'] })
};


const generateRequirements = (e, personal_information) => {

    event.preventDefault();

    axios.get(`/loan/${personal_information.id}/requirements/download`,
        { responseType: 'blob' })
        .then(response => {
            objToast.value = {
                title: 'Success',
                icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                message: 'Requirements ZIP is now ready to download',
                cancelButton: 'Close',
                showCancelButton:true,
                onClickCancel: () => { objToast.value = null },
                onClickConfirm: (e) => {
                    downloadZip(window.URL.createObjectURL(new Blob([response.data])) , e, `${personal_information.lastname}-${personal_information.firstname}-${personal_information.middlename}-Requirements.zip`);
                    objToast.value = null;
                    refreshDashboardData();
                },
                confirmButton: 'Download'
            }

        }).catch(error => console.log(error));
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