<template>
  <Toast :toast="objToast" />
  <div class="container">
    <div class="flex flex-col border rounded-xl shadow-sm p-6 dark:bg-slate-800 dark:border-gray-700">
      <div class="py-3 px-0 flex justify-between">
              <div class="relative max-w-xs">
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
            </div>
      <div class="overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div>
            <!-- TABLE HEREEE -->
            <div v-if="displayedLoans.length > 0">
              <LoanTable v-model:tableData="displayedLoans" />
            </div>
            <!-- TABLE HEREEE -->
          </div>
        </div>
      </div>
      <Pagination v-if="displayedLoans.length > 0" v-model:totalItems="filteredLoans.length" v-model:itemsPerPage="itemsPerPage"
         v-model:currentPage="currentPage" class="my-4 mx-2" />
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch, inject } from 'vue';
import LoanTable from './LoanTable.vue';
import Dropdown from '@/Components/Dropdown/Index.vue';
import Filter from '@/Components/Filter/Index.vue';
import { usePage ,router} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination/Index.vue';
import Button from '@/Components/Buttons/Index.vue';
import Toast from '@/Components/Toast/Index.vue';
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
      const fieldsToSearch = ['uuid', 'amount','updated_at'];
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


const dropdownItems = ref([
  {
    isHeader: false,
    isClickable: true,
    name: 'Information Verification',
    header: '',
    desc: '',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 size-4 feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>',
    onClick: () => sendEmailNotification('informationVerification', 2),
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'For Interview',
    header: '',
    desc: '',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-outgoing shrink-0 size-4"><polyline points="23 7 23 1 17 1"/><line x1="16" y1="8" x2="23" y2="1"/><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
    onClick: () => sendEmailNotification('forInterview', 3)
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'For Approval',
    header: '',
    desc: '',
    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock size-4 shrink-0"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>`,
    onClick: () => sendEmailNotification('forApproval', 4)
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'Approve',
    header: '',
    desc: '',
    icon: ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up shrink-0 size-4"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>',
    onClick: () => sendEmailNotification('approve', 5)
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'Decline',
    header: '',
    desc: '',
    icon: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down size-4 shrink-0"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"/></svg>`,
    onClick: () => sendEmailNotification([loan], 'decline', 6)
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'For Releasing',
    header: '',
    desc: '',
    icon: `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card size-4 shrink-0"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    `,
    onClick: () => sendEmailNotification('forRealeasing', 7)
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'Download Application Form',
    header: '',
    desc: '',
    icon: `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud shrin-0 size-4"><polyline points="8 17 12 21 16 17"/><line x1="12" y1="12" x2="12" y2="21"/><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"/></svg>
                    `,
    onClick: () => navigateToRoute('profile.edit')
  }
]);


</script>

<style lang="scss" scoped></style>
