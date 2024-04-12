<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InformationVerification from './InformationVerification/Index.vue';
</script>

<template>
    <Head title="Information Verification" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Information Verification</h1>
        </div>
        <InformationVerification/>
    </AuthenticatedLayout>
</template>
