<template>
    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full text-sm sticky top-5">
        <nav class="relative max-w-[85rem] w-full bg-white border border-gray-200 rounded-[36px] mx-2 py-3 px-4 lg:flex md:items-center lg:justify-between lg:py-0 md:px-6 lg:px-8 xl:mx-auto dark:bg-gray-800 dark:border-gray-700"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <Link
                    preserve-scroll
                    class="lg:order-1 flex gap-5 items-center text-lg text-nowrap font-semibold dark:text-white text-blue-900"
                    :href="'/'"
                    @click.prevent="scrollToELements('home')">
                <img class="w-10 h-auto dark:hidden" src="../../assets/images/logo.png" alt="logo">
                <img class="w-10 h-auto hidden dark:block" src="../../assets/images/logo-white.png" alt="logo">
                Seaman Loan Express
                </Link>
                <div class="lg:hidden">
                    <button type="button" @click="openNavbar != openNavbar"
                        class="hs-collapse-toggle size-8 flex justify-center items-center text-sm font-semibold rounded-full border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation" :class="{ 'hidden': !openNavbar }"
                class="hs-collapse  overflow-hidden transition-all duration-300 basis-full grow lg:block">
                <div
                    class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:items-center lg:justify-end lg:gap-y-0 lg:gap-x-3 lg:mt-0 md:ps-7">
                    <Link
                        class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
                        :class="{ 'text-blue-900 hover:text-blue-500 dark:text-white border-b-2 border-yellow-500':(activePath === '/' || activeSection === '')}"
                        :href="'/'"
                        preserve-scroll
                        @click.prevent="scrollToELements('home')">Home</Link>
                    <Link :href="route('search.reference')"
                        :class="{ 'text-blue-900 hover:text-blue-500 dark:text-white border-b-2 border-yellow-500': activePath.startsWith('/search-reference')  }"
                        class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500">
                        Track Your Application</Link>
                        <Link :href="'/?section=qualification-requirements'" preserve-scroll
                        :class="{ 'text-blue-900 hover:text-blue-500 dark:text-white border-b-2 border-yellow-500': activeSection === 'qualification-requirements'}"
                        @click.prevent="scrollToELements('qualification-requirements')"
                        class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500">
                        Qualification & Requirements</Link>
                        <Link :href="'/?section=how-to-apply'" preserve-scroll
                        :class="{ 'text-blue-900 hover:text-blue-500 dark:text-white border-b-2 border-yellow-500': activeSection === 'how-to-apply'}"
                        class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
                            @click.prevent="scrollToELements('how-to-apply')"    
                        >How to apply</Link>
                        <Link :href="'/?section=about-us'" preserve-scroll
                        :class="{ 'text-blue-900 hover:text-blue-500 dark:text-white border-b-2 border-yellow-500': activeSection === 'about-us'}"
                        class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500"
                            @click.prevent="scrollToELements('about-us')"    
                        >About Us</Link>

                    <div
                        class="flex  lg:flex-row flex-col lg:items-center- gap-y-3 gap-x-2 font-medium text-gray-500 hover:text-blue-600 lg:border-s lg:border-gray-300 md:my-6 lg:ps-6 dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500">
                        <button @click="toggleDark()"
                            class="py-2 px-3 inline-flex max-w-[100px] items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg v-if="!isDark" data-svg="" class="flex-shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                            </svg>
                            <svg v-else data-svg="" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 8a2 2 0 1 0 4 4"></path>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                            {{ isDark ? 'Light' : 'Dark' }}
                        </button>

                        <button v-if="canLogin"
                            class="py-2 cursor-pointer px-3 inline-flex items-center max-w-[100px] gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            @click="OpenModal()">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Sign in
                        </button>

                        <Apply/>

                        <a
                        @click="isApplyNowModal = true"
                        class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-900 dark:bg-yellow-500 dark:hover:bg-yellow-500 dark:text-blue-900 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#" data-v-c0937083=""> 
                        Apply na! 
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-v-c0937083=""><path d="m9 18 6-6-6-6" data-v-c0937083=""></path></svg></a>

                    </div>
                </div>
            </div>
        </nav>
        <Login v-model:isModalOpen="isModalOpen" />
        <ApplyModal v-model:isApplyNowModal="isApplyNowModal" @onCloseModal="onCloseModal"/>
    </header>
</template>

<script setup>
import { useDark, useToggle } from '@vueuse/core';
import { Link } from '@inertiajs/vue3';
import Login from '../../Pages/Auth/Login.vue';
import { ref } from 'vue';
import ApplyModal from '../Apply/ApplyModal.vue';
const openNavbar = ref(false);
const isDark = useDark();
const toggleDark = useToggle(isDark);
const isModalOpen = ref(false);
const isApplyNowModal = defineModel('isApplyNowModal');
const activeSection = defineModel('activeSection');

const OpenModal = () => {
    isModalOpen.value = true;
}

const onCloseModal = ()=>{
    isApplyNowModal.value = false
}

defineProps({
    canLogin: {
        type: Boolean,
    },
    activePath: {
        type: String,
        default: '/'
    }
})





const emit = defineEmits(['scrollToELements']);


const scrollToELements = (id) =>{
    activeSection.value = id;
  emit('scrollToELements', id);
}
</script>

<style lang="scss" scoped></style>