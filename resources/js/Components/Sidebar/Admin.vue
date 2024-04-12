<template>
     <!-- ========== MAIN CONTENT ========== -->
        <!-- Sidebar Toggle -->
        <div
            class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center py-4">
                <!-- Navigation Toggle -->
                <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar"
                    aria-controls="application-sidebar" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                </button>
                <!-- End Navigation Toggle -->
            </div>
        </div>
        <!-- End Sidebar Toggle -->
        <!-- Sidebar -->
        <div id="application-sidebar"
            class="hs-overlay-backdrop-open:!hidden
            hs-overlay-open:translate-x-0  -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6">
                <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="#" aria-label="Brand">Seaman Loan Express</a>
            </div>
            <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="space-y-1.5" id="triggerClose">
                    <li>
                        <Link :href="route('dashboard')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/dashboard' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Dashboard
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('initialApplication')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/initial-application' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Initial Application
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('informationVerification')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/information-verification' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user-check shrink-0 size-4">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="8.5" cy="7" r="4" />
                            <polyline points="17 11 19 13 23 9" />
                        </svg>
                        Information Verification
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('forInterview')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/for-interview' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-phone-outgoing shrink-0 size-4">
                            <polyline points="23 7 23 1 17 1" />
                            <line x1="16" y1="8" x2="23" y2="1" />
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        For Interview
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('forApproval')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/for-approval' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock size-4 shrink-0"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> 
                            For Approval
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('approved')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/approved' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up shrink-0 size-4"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                            Approved Applications
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('declined')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/declined' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down size-4 shrink-0"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"/></svg>
                            Declined Applications
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('releasing')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/for-releasing' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card size-4 shrink-0"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                            For Releasing
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('released')"
                            :class="{ 'bg-yellow-500 text-blue-900 hover:bg-yellow-500 hover:text-blue-900 dark:text-blue-900': $page.url === '/released' }"
                            class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="shrink-0 size-4"><path fill="currentColor" d="m14.53 1.45l-1.08 1.08l1.6 1.6c.22.25.33.54.33.87s-.11.64-.33.86L11.5 9.47l1 1.08l3.63-3.61c.53-.59.79-1.24.79-1.94s-.26-1.36-.79-1.95zm-3.98 2.02L9.47 4.55l.61.56c.22.22.33.52.33.89s-.11.67-.33.89l-.61.56l1.08 1.08l.56-.61c.53-.59.8-1.23.8-1.92c0-.72-.27-1.37-.8-1.97zM21 5.06c-.69 0-1.33.27-1.92.8l-5.63 5.64l1.08 1l5.58-5.56c.25-.25.55-.38.89-.38s.64.13.89.38l.61.61l1.03-1.08l-.56-.61c-.59-.53-1.25-.8-1.97-.8M7 8L2 22l14-5zm12 3.06c-.7 0-1.34.27-1.94.8l-1.59 1.59l1.08 1.08l1.59-1.59c.25-.25.53-.38.86-.38c.33 0 .63.13.88.38l1.62 1.59l1.05-1.03l-1.6-1.64c-.59-.53-1.25-.8-1.95-.8"/></svg>
                            Released
                        </Link>
                    </li>
                </ul>
            </nav>
        </div>
</template>
<script setup>
import {Link} from '@inertiajs/vue3';

</script>

<style scoped>
.z1{
    z-index:  1 !important;
}
</style>