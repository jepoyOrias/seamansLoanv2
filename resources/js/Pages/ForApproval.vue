<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ForApproval from './ForApproval/Index.vue';
</script>

<template>
    <Head title="For Approval" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">For Approval</h1>
        </div>
        <ForApproval/>
    </AuthenticatedLayout>
</template>
