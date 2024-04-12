<template>
    <div class="hs-dropdown relative inline-flex">
        <button id="hs-dropdown-custom-trigger" type="button"
            :class="triggerClass"
            :disabled="disabled">
            <span v-html="trigger?.item"></span>
        </button>
        <div class="hs-dropdown-menu transition-[opacity,margin] z-50 duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700"
            aria-labelledby="hs-dropdown-custom-trigger">
            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700" v-if="dropdownHeader">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ dropdownHeader.header }}</p>
                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                    <span v-html="dropdownHeader.icon"></span> {{ dropdownHeader.name }}
                </p>
            </div>
            <div class="mt-2 py-2 first:pt-0 last:pb-0">
                <a v-for="(item,index) in dropdownItems" :key="index" :class="getItemClass(item)"
                    @click="handleItemClick(item)"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <span v-html="item.icon" class="flex-shrink-0 size-4" v-if="item.icon"></span>
                    {{ item.name }}
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref, onMounted, onUnmounted } from 'vue';

const dropDownIsOpen = ref(false);
const dropdown = ref();
const props = defineProps({
    trigger: {
        type: Object,
    },
    dropdownItems: {
        type: Array,
    },
    dropdownHeader: {
        type: Object,
    },
    returnParams: {
        type: Object,
        default: null,
    },
    triggerClass:{
        type:String,
        default:`hs-dropdown-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold 
        rounded-full border border-transparent text-gray-800  hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none
         dark:text-white  dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600`
    },
    disabled:{
        type:Boolean,
        default:false
    }
});



// Close dropdown when clicking outside
const handleClickOutside = (event) => {
    if (dropDownIsOpen.value && !dropdown.value.contains(event.target)) {
          dropDownIsOpen.value = false;
    }
};

// Add event listener when component is mounted
onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

// Remove event listener when component is unmounted
onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

const toggleDropdown = () => {
    dropDownIsOpen.value = !dropDownIsOpen.value;
};

const getItemClass = (item) => {
    return item.isClickable ? 'cursor-pointer' : 'pointer-events-none';
};

const handleItemClick = (item) => {
    if (item.onClick) {
        item.onClick(props.returnParams);
        dropDownIsOpen.value = false;
    }
};
</script>

<style lang="scss" scoped></style>
