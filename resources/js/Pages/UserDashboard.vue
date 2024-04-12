<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UserDashboardIndex from './UserDashboard/Index.vue';
</script>

<template>
    <Head title="user Dashboard" />

    <AuthenticatedLayout>
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Welcome {{ $page.props.auth.user.name }}</h1>
        </div>
        <UserDashboardIndex/>
    </AuthenticatedLayout>
</template>
