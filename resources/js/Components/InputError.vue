<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div>
        <p class="text-sm text-red-600 dark:text-white font-weight-600">
            {{ message }}
        </p>
    </div>
</template>
