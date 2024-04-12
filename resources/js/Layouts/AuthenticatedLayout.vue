<script setup>
import AdminNavbar from '@/Components/Navbar/AdminNavbar.vue';
import AdminSidebar from '@/Components/Sidebar/Admin.vue';
import { onMounted } from 'vue';

onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods.autoInit();
    }, 100);
});

</script>

<template>
    <div>

        <AdminNavbar />

        <AdminSidebar v-if="$page.props.auth.user.role_id === 1" />
        <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
            <slot />
        </div>
    </div>
</template>
