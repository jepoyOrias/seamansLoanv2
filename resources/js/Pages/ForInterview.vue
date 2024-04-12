<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ForInterview from './ForInterview/Index.vue';
</script>

<template>
    <Head title="For Interview" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">For Interview</h1>
        </div>
        <ForInterview/>
    </AuthenticatedLayout>
</template>
