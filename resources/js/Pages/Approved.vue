<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Approved from './Approved/Index.vue';
</script>

<template>
    <Head title="Approved Applications" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">Approved Applications</h1>
        </div>
        <Approved/>
    </AuthenticatedLayout>
</template>
