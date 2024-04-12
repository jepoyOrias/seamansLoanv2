<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Released from './Released/Index.vue';
</script>

<template>
    <Head title="Released Loan"/>
    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Released Loan</h1>
        </div>
        <Released/>
    </AuthenticatedLayout>
</template>
