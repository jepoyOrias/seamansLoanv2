<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ForReleasing from './ForReleasing/Index.vue';
</script>

<template>
    <Head title="Releasing" />

    <AuthenticatedLayout >
        <div class="container">
            <h1 class="dark:text-slate-100 text-xl mb-6 :text-blue-700">For Releasing</h1>
        </div>
        <ForReleasing/>
    </AuthenticatedLayout>
</template>
