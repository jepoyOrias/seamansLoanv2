<template>
    <div>
        <Navbar :canLogin="$page.props.canLogin" :activePath="$page.url" />
        <!-- Hero -->
        <div class="relative overflow-hidden">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
                <div class="text-center">
                    <h1 class="text-4xl sm:text-6xl font-bold text-blue-900 dark:text-gray-200">
                        Privacy Policy
                    </h1>

                    <p class="mt-3 text-gray-600 dark:text-gray-400 max-w-[550px] text-center mx-auto">
                        Data Privacy Act for Seaman Loan Express
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 max-w-[550px] text-center mx-auto">
                        Last updated: April 12, 2024
                    </p>
                    <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Purpose</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            The purpose of this Data Privacy Act is to ensure the protection and confidentiality of
                            personal information collected, processed, and stored by Seaman Loan Express in relation to
                            its services provided to seafarers.
                        </p>
                    </div>
                    <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Definitions</h2>
                        <ol class="dark:text-slate-50 text-slate-950 my-3 flex flex-col gap-3 list-disc px-5">
                            <li> Personal Information: Any information relating to an identified or identifiable
                                individual.</li>
                            <li> Data Subject: An individual who is the subject of personal information.</li>
                            <li> Processing: Any operation or set of operations performed upon personal information.
                            </li>
                            <li> Data Controller: The natural or juridical person or any other body which alone or
                                jointly
                                with others determines the purposes and means of the processing of personal information.
                            </li>
                            <li> Data Processor: Any natural or juridical person or any other body to whom personal
                                information is disclosed, whether a third party or not, who processes such personal
                                information on behalf of the data controller.</li>
                            <li> Consent: Any freely given, specific, informed indication of will, whereby the data
                                subject
                                agrees to the collection and processing of personal information.</li>

                        </ol>
                    </div>
                    <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Collection of Personal Information</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Seaman Loan Express shall collect only the necessary personal information from seafarers,
                            with their consent, for the purpose of providing loan services. Personal information
                            collected may include but is not limited to:
                        </p>
                        <ol class="dark:text-slate-50 text-slate-950 my-3 flex flex-col gap-3 list-disc px-5">
                            <li> Name Contact information (address, email, phone number)</li>
                            <li> Financial information (income, bank account details)</li>
                            <li>  Employment information (employer, contract details)</li>
                        </ol>
                    </div>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Processing and Storage of Personal Information</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Personal information collected by Seaman Loan Express shall be processed and stored securely. Access to personal information shall be restricted to authorized personnel only and shall be used solely for the purposes for which it was collected.
                        </p>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Disclosure of Personal Information</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Seaman Loan Express shall not disclose personal information to third parties without the explicit consent of the data subject, except as required by law or necessary for the provision of loan services.
                        </p>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Security Measures</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Seaman Loan Express shall implement appropriate technical and organizational security measures to protect personal information against unauthorized access, alteration, disclosure, or destruction.
                        </p>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Data Subject Rights</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Data subjects have the right to access, correct, or delete their personal information held by Seaman Loan Express. Requests for such actions shall be addressed promptly by Seaman Loan Express in accordance with applicable laws and regulations.
                        </p>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Compliance</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Seaman Loan Express shall comply with all applicable laws and regulations regarding the collection, processing, and protection of personal information, including but not limited to the Data Privacy Act.
                        </p>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Amendments</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            Seaman Loan Express reserves the right to amend this Data Privacy Act at any time. Any changes to this Act shall be communicated to data subjects and posted on the company's website.
                        </p>
                </div>
                <div class="mt-7 text-xl sm:mt-12 relative text-start text-blue-900 dark:text-yellow-500">
                        <h2 class="text-3xl">Contact Information</h2>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            For inquiries or concerns regarding the processing of personal information by Seaman Loan Express, data subjects may contact:
                        </p>
                        <p class="dark:text-slate-50 text-slate-950 my-3">
                            09567508036
                        </p>
                </div>
            </div>
        </div>
        <!-- End Hero -->
        <Footer :activePath="$page.url" @scrollToELements="scrollToELements" v-model:activeSection="activeSection" />
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

const scrollToELements = (id = null) => {
    const params = new URLSearchParams(window.location.search);
    const section = params.get('section');
    if (id || section) {
        const element = document.getElementById(id || section || 'home');
        if (element && id !== 'home') {
            element.scrollIntoView({ behavior: 'smooth' });
        } else {
            scrollToTop();
        }
    }
};


const searchReference = () => {
    router.visit('/search-reference', {
        data: { query: query.value },
        only: ["loanInformation", "query"]
    });
}


</script>

<style lang="scss" scoped></style>