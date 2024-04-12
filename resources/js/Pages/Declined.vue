<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Declined from './Declined/Index.vue';
</script>

<template>
    <Head title="Declined Application" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Declined Application</h1>
        </div>
        <Declined/>
    </AuthenticatedLayout>
</template>
