<template>
    <div>
        <!-- Uploading File Content -->
        <div class="mb-2 flex justify-between items-center">
            <div class="flex items-center gap-x-3">
                <span
                    class="size-8 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="17 8 12 3 7 8" />
                        <line x1="12" x2="12" y1="3" y2="15" />
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-800 dark:text-white">{{ fileName }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500">{{ convertedSize }}</p>
                </div>
            </div>
        </div>
        <!-- End Uploading File Content -->
        <!-- Progress Bar -->

        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar"
            :aria-valuenow="props.progress.percentage" :value="props.progress.percentage" aria-valuemin="0"
            aria-valuemax="100">
            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                :style="{ width: props.progress.percentage + '%' }"></div>
        </div>

        <!-- End Progress Bar -->
    </div>
</template>

<script setup>
import { computed } from "vue";


const props = defineProps({
    fileName: { type: String, default: "" },
    progress: { type: Object, default: {} }
});


const formatBytes = (bytes, decimals = 2) => {
    if (bytes === 0) return '0 Bytes';

    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB'];

    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];

}

const convertedSize = computed(() => formatBytes(props.progress?.bytes));



</script>

<style lang="scss" scoped></style>