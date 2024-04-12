<template>
  <Toast :toast="objToast" />
  <div class="container">
    <div class="flex flex-col">
      <div class="border rounded-xl shadow-sm p-6 dark:bg-slate-800 dark:border-gray-700">
        <div class="py-3 px-0 flex justify-between flex-wrap gap-2">
          <div class="relative max-w-xs">
            <label class="sr-only">Search</label>
            <input type="text" name="hs-table-with-pagination-search" v-model="searchQuery"
              id="hs-table-with-pagination-search"
              class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
              placeholder="Search for items">
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
              <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </div>
          </div>
          <Button :onClick="() => refreshLoans()" class="bg-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-refresh-cw shrink-0 size-4">
              <polyline points="23 4 23 10 17 10" />
              <polyline points="1 20 1 14 7 14" />
              <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
            </svg>
            Refresh Page
          </Button>
        </div>
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">

            <!-- TABLE HEREEE -->
            <div v-if="displayedLoans.length > 0">
              <LoanTable v-model:tableData="displayedLoans" />

            </div>
            <NoData v-else />
            <!-- TABLE HEREEE -->
            <Pagination v-model:totalItems="filteredLoans.length" v-model:itemsPerPage="itemsPerPage"
              v-model:currentPage="currentPage" class="my-4 mx-2" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch, inject } from 'vue';
import LoanTable from './LoanTable.vue';
import { usePage, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination/Index.vue';
import Toast from '@/Components/Toast/Index.vue';
import NoData from '@/Components/NoData/Index.vue';
import axios from 'axios';
import Button from '@/Components/Buttons/Index.vue'

const searchQuery = ref('');
const page = usePage();
const itemsPerPage = ref(10);
const currentPage = ref(1);
const startIndex = ref(0);
const endIndex = ref(0);
const displayedLoans = ref([]);
const objToast = ref(null);

const arrSelectedFilters = ref([]);



onMounted(() => {
  updateDisplayedLoans();
});


const hasSelectedApplication = computed(() => {
  return displayedLoans.value.filter(item => item.checked).length > 0 ? false : true;
})


const filteredLoans = computed(() => {
  let filtered = page.props.loans;
  // Apply search query filter
  if (searchQuery.value) {
    filtered = filtered.filter(loan => {
      const fieldsToSearch = ['personal_information.name', 'personal_information.employer_information.position', 'amount', 'personal_information.phone_number', 'term_months'];
      for (const field of fieldsToSearch) {
        const fieldValue = getFieldByPath(loan, field);
        if (fieldValue && fieldValue.toString().toLowerCase().includes(searchQuery.value.toLowerCase())) {
          return true;
        }
      }
      return false;
    });
  }

  return filtered;
});


watch([() => page.props.loans, () => currentPage.value, () => itemsPerPage.value, () => searchQuery.value, () => filteredLoans.value], () => {
  updateDisplayedLoans();
});


const updateDisplayedLoans = () => {
  startIndex.value = (currentPage.value - 1) * itemsPerPage.value;
  endIndex.value = Math.min(startIndex.value + itemsPerPage.value, filteredLoans.value.length);
  displayedLoans.value = filteredLoans.value.slice(startIndex.value, endIndex.value);
};

// Function to get the field value by path
function getFieldByPath(obj, path) {
  const keys = path.split('.');
  let value = obj;
  for (const key of keys) {
    if (!value.hasOwnProperty(key)) {
      return undefined;
    }
    value = value[key];
  }
  return value;
}

const tableHeader = ref([
  {
    name: 'Name',
    fieldName: 'loan.personal_information.name'
  },
  {
    name: 'Position',
    fieldName: 'loan.personal_information.employer_information.position'
  },
  {
    name: 'Loan Amount',
    fieldName: 'Intl.NumberFormat().format(loan.amount)'
  },
  {
    name: 'Term in Months',
    fieldName: 'loan.term_months'
  },
  {
    name: 'Phone Number',
    fieldName: 'loan.personal_information.phone_number'
  },
  {
    name: 'Facebook Name / Link',
    fieldName: 'loan.personal_information.facebook_account_name'
  },
  {
    name: 'Loan Status',
    fieldName: 'loan.status.status'
  },
]);

const refreshLoans = () => {
  router.reload({ only: ['loans'] })
};


</script>

<style lang="scss" scoped></style>
