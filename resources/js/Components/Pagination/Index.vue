<template>
  <div class="flex sm:flex-wrap sm:justify-center sm:flex  sm:items-center gap-2">
    <!-- Pagination -->
    <nav class="flex items-center gap-x-1">
      <!-- Previous Button -->
      <button @click="previousPage" :disabled="currentPage === 1" type="button"
        class="min-h-[38px] min-w-[38px] py-2 text-xs sm:text-sm px-2.5 inline-flex justify-center items-center gap-x-1.5 rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="m15 18-6-6 6-6" />
        </svg>
        <span>Previous</span>
      </button>

      <!-- Page Buttons -->
      <div class="flex items-center gap-x-1">
        <button v-for="pageNumber in totalPages" :key="pageNumber" @click="goToPage(pageNumber)"
          :class="{ 
            'text-blue-800 border-blue-800 dark:text-yellow-500 font-black border dark:border-yellow-500': pageNumber === currentPage, 
            'text-gray-800 hover:bg-gray-100': pageNumber !== currentPage 
            }"
          class="min-h-[24px] min-w-[24px] sm:min-h-[38px]  sm:min-w-[38px] flex justify-center items-center text-xs sm:text-sm text-gray-800 hover:bg-gray-100 py-2 px-3 rounded-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
          {{ pageNumber }}
        </button>
      </div>

      <!-- Next Button -->
      <button @click="nextPage" :disabled="currentPage === totalPages" type="button"
        class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center
        text-xs sm:text-sm
         gap-x-1.5  rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none
          dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
        <span>Next</span>
        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </button>
    </nav>
    <!-- End Pagination -->

    <!-- Items Per Page Dropdown -->
    <div class="flex justify-center items-center gap-x-5">
      <div class="hs-dropdown relative inline-flex [--placement:top-left]">
        <button id="hs-default-pagination-dropdown" type="button"
          class="hs-dropdown-toggle py-2 px-2.5 inline-flex items-center gap-x-1 text-sm rounded-lg border border-gray-200 text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
          {{ itemsPerPage }} page
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>
        <div
          class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 hidden z-50 transition-[margin,opacity] opacity-0 duration-300 mb-2 bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700"
          aria-labelledby="hs-default-pagination-dropdown">
          <button v-for="option in perPageOptions" :key="option" type="button" @click="changeItemsPerPage(option)"
            :class="{'bg-gray-100': option === itemsPerPage}"
            class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
            {{ option }} page
            <svg v-if="option === itemsPerPage" class="ms-auto flex-shrink-0 size-4 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </button>
        </div>
      </div>
      <!-- End Dropdown -->
    </div>
  </div>
</template>

<script setup>
import { ref, defineProps, computed, defineEmits,watchEffect } from 'vue';

// Props


const currentPage = defineModel("currentPage", {default: 1});
const itemsPerPage = defineModel("itemsPerPage", {default: 5});
const totalItems = defineModel("totalItems", {default:0});
const totalPages = ref(0);


// Methods
const nextPage = () => {
  if (currentPage.value < totalPages.value) {
     currentPage.value  +=1
  }
};

const previousPage = () => {
  if (currentPage.value > 1) {
    currentPage.value -=1   
  }
};

const goToPage = (pageNumber) => {
  currentPage.value = pageNumber;
};

const changeItemsPerPage = (perPage) => {
  itemsPerPage.value = perPage;
  currentPage.value = 1;
};

watchEffect(() => {
  totalPages.value = Math.ceil(totalItems.value / itemsPerPage.value);
});

// Per page options
const perPageOptions = [5, 10, 20, 50, 100];
</script>
