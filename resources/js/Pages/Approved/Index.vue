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
              <div class="flex gap-4">
                <Button :onClick="()=>sendEmailNotification('forReleasing', 7)" :disabled="hasSelectedApplication" class="'py-2'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send shrink-0 size-4"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                  Send for Releasing
                </Button>
              </div>
            </div>
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
    
            <!-- TABLE HEREEE -->
            <div v-if="displayedLoans.length > 0">
              <LoanTable v-model:tableData="displayedLoans" />
             
            </div>
            <NoData v-else/>
            <Pagination v-model:totalItems="filteredLoans.length" v-model:itemsPerPage="itemsPerPage"
                v-model:currentPage="currentPage" class="my-4 mx-2" />
            <!-- TABLE HEREEE -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import LoanTable from './LoanTable.vue';
import Dropdown from '@/Components/Dropdown/Index.vue';
import Filter from '@/Components/Filter/Index.vue';
import { usePage ,router} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination/Index.vue';
import Button from '@/Components/Buttons/Index.vue';
import Toast from '@/Components/Toast/Index.vue';
import NoData from '@/Components/NoData/Index.vue';
import axios from 'axios';

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

  // Apply selected filters if available
  if (arrSelectedFilters.value.length > 0) {
    console.log("test");
    filtered = filtered.filter(loan => {
      return arrSelectedFilters.value.map(item=>item.status).includes(loan.status.status);
    });
  }

  return filtered;
});


watch([() => page.props.loans, () => currentPage.value, () => itemsPerPage.value, () => searchQuery.value, ()=>filteredLoans.value], () => {
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

const downloadZip = (url) => {
  const link = document.createElement('a');
  link.href = url;
  link.setAttribute('download', 'application-forms.zip');
  document.body.appendChild(link);
  link.click();
  link.remove();
}

const generateApplicationForm = () => {
  const selectedIds = displayedLoans.value.filter(item => item.checked).map(items => items.id);
  axios.post('download-application', {
    ids: selectedIds,
  }, {
    responseType: 'blob' // Set the response type to 'blob'
  }).then(response => {
    console.log(response);
    objToast.value = {
      title: 'Success',
      icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
      message: 'Application Form ZIP is now ready to download',
      cancelButton: 'Close',
      onClickCancel: () => { objToast.value = null },
      onClickConfirm: () => downloadZip(window.URL.createObjectURL(new Blob([response.data]))),
      confirmButton: 'Download'
    }

  }).catch(error => console.log(error));
}



// Dropdown trigger and items
const dropdownTrigger = ref({
  item: `<div class="flex gap-[0.1rem]">
            <div class="p-[0.5px] shadow-sm bg-blue-900 dark:bg-white w-1 h-1 rounded-full"></div>
            <div class="p-[0.5px] shadow-sm bg-blue-900 dark:bg-white w-1 h-1 rounded-full"></div>
            <div class="p-[0.5px] shadow-sm bg-blue-900 dark:bg-white w-1 h-1 rounded-full"></div>
        </div>`
});


const sendEmailNotification = async (typeOfEmail, statusId) => {
  const loanIds = displayedLoans.value.filter(item => item.checked).map(loan => loan.id);

  try {
    objToast.value = {
      title: 'Sending an Email',
      icon: ' <span class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full" role="status" aria-label="loading"></span>',
      message: 'Sending email, please wait! 💌✨'
    }

    if (loanIds.length) {
      const response = await axios.post('send-email-notification', {
        loanIds: loanIds,
        typeOfEmail: typeOfEmail,// Example loan IDs
        statusId: statusId
      });

      objToast.value = {
        title: 'Success',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        message: 'Email Successfully Sent'
      }
     
    } else {
      objToast.value = {
        title: 'Error',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle shrink-0 text-red-500"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
        message: 'Please Check some Data in table',
        cancelButton: 'Close',
        onClickCancel: () => { objToast.value = null },
      }
    }
    refreshDashboardData();

    // Handle success response
  } catch (error) {

    objToast.value = {
      title: 'Error',
      icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle shrink-0 text-red-500"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
      message: error.response.data.error,
      cancelButton: 'Close',
      onClickCancel: () => { objToast.value = null },
    }

  }
  finally {
    setTimeout(() => {
      objToast.value = null;
    }, 5000)

  }
};

const refreshDashboardData = () => {
  router.reload({ only: ['loans'] })
};


</script>

<style lang="scss" scoped></style>
