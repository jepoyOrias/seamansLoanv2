<template>
    <div>
        <Navbar :canLogin="$page.props.canLogin" :activePath="$page.url" />
        <!-- Hero -->
        <div class="relative overflow-hidden">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
                <div class="text-center">
                    <h1 class="text-4xl sm:text-6xl font-bold text-blue-900 dark:text-gray-200">
                        Track Your Application Status
                    </h1>

                    <p class="mt-3 text-gray-600 dark:text-gray-400 max-w-[550px] text-center mx-auto">
                        Empowering progress, one loan at a time. Track your journey with confidence as our application
                        keeps you informed every step of the way.
                    </p>

                    <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                        <!-- Form -->
                        <form>
                            <div
                                class="relative z-10 flex space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-900 dark:border-gray-700 dark:shadow-gray-900/[.2]">
                                <div class="flex-[1_0_0%]">
                                    <label for="hs-search-article-1"
                                        class="block text-sm text-gray-700 font-medium dark:text-white"><span
                                            class="sr-only">Track Applicaiton</span></label>
                                    <input type="text" name="hs-search-article-1" id="hs-search-article-1"
                                        v-model="query"
                                        class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:ring-transparent focus:border-0 dark:bg-slate-900 dark:border-transparent dark:text-gray-400"
                                        placeholder="Input Reference Number">
                                </div>
                                <div class="flex-[0_0_auto]" @click="searchReference()">
                                    <a class="size-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-yellow-500 text-white hover:bg-yellow-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->

                        <!-- SVG Element -->
                        <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                            <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                    stroke-width="10" stroke-linecap="round" />
                                <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5"
                                    stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                                    stroke-width="10" stroke-linecap="round" />
                            </svg>
                        </div>
                        <!-- End SVG Element -->

                        <!-- SVG Element -->
                        <div class="hidden md:block absolute bottom-0 start-0 translate-y-10 -translate-x-32">
                            <svg class="w-40 h-auto text-cyan-500" width="347" height="188" viewBox="0 0 347 188"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                                    stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                    <div v-if="$page.props.loanInformation">
                        <a v-if="$page.props.loanInformation.status_id === 1"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            Welcome aboard! Your application journey has commenced. Upon receiving your
                                            reference number, <strong class="dark:text-yellow-500 text-blue-900">we've
                                                initiated the assessment process.</strong> Rest assured, our team is
                                            dedicated to guiding you through each stage, providing clarity and support
                                            to ensure a seamless experience towards achieving your financial goals.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 2"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            Progress update! Your reference number is currently undergoing thorough
                                            <strong class="dark:text-yellow-500 text-blue-900">information
                                                verification.</strong> Our team is diligently reviewing your provided
                                            details to ensure accuracy and completeness.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 3"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            Exciting news! Your application has <strong
                                                class="dark:text-yellow-500 text-blue-900">advanced to the interview
                                                stage.</strong> We're eager to connect with you and discuss your
                                            financial goals further. Stay tuned for communication regarding scheduling.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 4"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            Great news! Your application has reached the <strong
                                                class="dark:text-yellow-500 text-blue-900">approval stage.</strong> Our
                                            team is carefully evaluating all aspects to ensure alignment with our
                                            lending criteria. Expect an update on the status soon.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 5"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            Congratulations! Your application has been <strong
                                                class="dark:text-yellow-500 text-blue-900">approved.</strong> You're one
                                            step closer to achieving your financial goals. Details regarding the next
                                            steps and terms will be communicated shortly.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 6"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            We regret to inform you that your application has been <strong
                                                class="text-red-500">declined.</strong>While we understand this may be
                                            disappointing, we're here to provide guidance and explore alternative
                                            options.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 7"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            Exciting news! Your approved loan is in the final stages of processing. Your
                                            reference number is now marked <strong
                                                class="dark:text-yellow-500 text-blue-900">for releasing</strong>, and
                                            funds will be disbursed according to the agreed-upon terms shortly.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a v-if="$page.props.loanInformation.status_id === 8"
                            class="mx-auto max-w-xl mt-[120px] flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            <div class="p-4 md:p-5">
                                <div class="flex">
                                    <div class="grow ms-5">
                                        <h3
                                            class="group-hover:text-blue-600  text-xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            Reference Status
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-5">
                                            <strong class="dark:text-yellow-500 text-blue-900">Congratulations! Your
                                                loan has been successfully released.</strong>
                                            Funds have been transferred according to the agreed-upon terms. Thank you
                                            for choosing us to assist with your financial needs.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <NoData v-else class="mx-auto max-w-xl mt-[120px]"/>
                </div>
            </div>
        </div>
        <!-- End Hero -->
        <Footer :activePath="$page.url" @scrollToELements="scrollToELements" v-model:activeSection="activeSection"/>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Navbar/Navbar.vue';
import { router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import NoData from '@/Components/NoData/Index.vue';
import Footer from '@/Components/Footer/Index.vue';

const page = usePage();
const query = ref(page.props.query);
const activeSection = ref('');

const scrollToELements = (id  = null) => {
  const params = new URLSearchParams(window.location.search);
  const section = params.get('section');
  if (id || section) {
    const element = document.getElementById(id || section || 'home');
    if (element && id !== 'home') {
      element.scrollIntoView({ behavior: 'smooth' });
    }else{
      scrollToTop();
    }
  }
};


const searchReference = () => {
    router.visit('/search-reference', {
        data: { query: query.value },
        only:["loanInformation", "query"]
    });
}


</script>

<style lang="scss" scoped></style>