<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InitialApplicationIndex from './InitialApplication/Index.vue';
</script>

<template>
    <Head title="Initial Application" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Initial Application</h1>
        </div>
        <InitialApplicationIndex/>
    </AuthenticatedLayout>
</template>
