<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DashboardIndex from './Dashboard/Index.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Dashboard</h1>
        </div>
        <DashboardIndex/>
    </AuthenticatedLayout>
</template>
