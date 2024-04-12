<template>
    <div class="hs-dropdown relative inline-block [--placement:bottom-right]" data-hs-dropdown-auto-close="inside">
      <button
        id="hs-as-table-table-filter-dropdown"
        type="button"
        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
      >
        <svg
          class="flex-shrink-0 size-3.5"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M3 6h18" />
          <path d="M7 12h10" />
          <path d="M10 18h4" />
        </svg>
        Filter
        <span
          class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-gray-700 dark:text-gray-300"
          >{{ selectedCount }}</span
        >
      </button>
      <div
        class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
        aria-labelledby="hs-as-table-table-filter-dropdown"
      >
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
          <label
            v-for="(item, index) in props.filterItems"
            :key="index"
            :for="'hs-as-filters-dropdown-status'+index"
            class="flex py-2.5 px-3"
          >
            <input
              type="checkbox"
              :id="'hs-as-filters-dropdown-status' + index"
              class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
              v-model="arrSelectedFilters"
              :value="item"
            />
            <span class="ms-3 text-sm text-gray-800 dark:text-gray-200">{{ item[showAttr] }}</span>
          </label>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps, defineModel, computed } from 'vue';
  
  const props = defineProps({
    filterItems: {
      type: Array,
      default: [],
    },
    showAttr:{
        type: String,
        default: 'status',
    }
  });
  
  const arrSelectedFilters = defineModel('arrSelectedFilters');
  
  const selectedCount = computed(() => arrSelectedFilters.value.length);

  </script>
  
  <style lang="scss" scoped></style>
  