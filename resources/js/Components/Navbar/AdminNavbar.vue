<template>
  <!-- ========== HEADER ========== -->
  <header
    class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64 dark:bg-gray-800 dark:border-gray-700">
    <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6 md:px-8" aria-label="Global">
      <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3">
        <div class="flex flex-row items-center justify-end gap-2 w-full">
          <Dropdown :trigger="dropdownTrigger" :dropdownItems="computedDropdownItems" :dropdownHeader="dropdownHeader" />
        </div>
      </div>
      <button type="button" @click="toggleDark()"
        class="py-2 px-3 ms-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        <svg v-if="!isDark" data-svg="" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
          height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
        </svg>
        <svg v-else data-svg="" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <circle cx="12" cy="12" r="4"></circle>
          <path d="M12 8a2 2 0 1 0 4 4"></path>
          <path d="M12 2v2"></path>
          <path d="M12 20v2"></path>
          <path d="m4.93 4.93 1.41 1.41"></path>
          <path d="m17.66 17.66 1.41 1.41"></path>
          <path d="M2 12h2"></path>
          <path d="M20 12h2"></path>
          <path d="m6.34 17.66-1.41 1.41"></path>
          <path d="m19.07 4.93-1.41 1.41"></path>
        </svg>
      </button>
    </nav>
  </header> 
  <CreateAdminModal v-model:createAdminModal="showCreateAdminModal"/>
  <!-- ========== END HEADER ========== -->
</template>

<script setup>
import { useDark, useToggle } from '@vueuse/core';
import Dropdown from '../Dropdown/Index.vue';
import { computed, ref } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import CreateAdminModal from '@/Pages/Global/CreateAdminModal.vue'

const page = usePage();
const userEmail = page.props.auth.user.email;
const isDark = useDark();
const toggleDark = useToggle(isDark);
const showCreateAdminModal = ref(false);

const dropdownTrigger = ref({
  item: `<img class="inline-block size-[38px] rounded-full ring-2 ring-white dark:ring-gray-800" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description" />`
});

const navigateToRoute = (routeName) => {
  if (routeName === 'logout') {
    router.post(route(routeName));
  } else {
    router.visit(route(routeName));
  }
};

const dropdownItems = ref([
  {
    isHeader: false,
    isClickable: true,
    name: 'Create Another Admin',
    header: '',
    desc: '',
    icon: '',
    onClick: () => showCreateAdminModal.value = true
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'Edit Profile',
    header: '',
    desc: '',
    icon: '',
    onClick: () => navigateToRoute('profile.edit')
  },
  {
    isHeader: false,
    isClickable: true,
    name: 'Logout',
    header: '',
    desc: '',
    icon: '',
    onClick: () => navigateToRoute('logout')
  }
]);

const computedDropdownItems = computed(()=>{
  let addDashboard = {}
    if(page.props.auth.user.role_id === 3){
        addDashboard = {
        isHeader: false,
        isClickable: true,
        name: 'Dashboard',
        header: '',
        desc: '',
        icon: '',
        onClick: () => navigateToRoute('dashboard')
      }
    }
    return [addDashboard,...dropdownItems.value]
});

const dropdownHeader = {
  isHeader: true,
  isClickable: false,
  name: userEmail,
  header: 'Sign in as',
  desc: '',
  icon: '',
  onClick: null,
};
</script>

<style scoped>
#application-sidebar-backdrop{
  display: none !important;
}
</style>