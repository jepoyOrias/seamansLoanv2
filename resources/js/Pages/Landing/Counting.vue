<template>
    <!-- Features -->
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="mt-5 grid gap-6 grid-cols-1 sm:gap-12 lg:grid-cols-3 lg:gap-8 text-center">
            <!-- Stats -->
            <div class="shadow-lg py-3 lg:shadow-none lg:bg-transparent">
                <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-blue-100">Loan Applications</h4>
                <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-500 dark:text-yellow-500">{{ applications}}</p>
            </div>
            <!-- End Stats -->

            <!-- Stats -->
            <div class="shadow-lg py-3 lg:shadow-none">
                <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-blue-100">Pending Application</h4>
                <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-500 dark:text-yellow-500">{{  pendingApplications }}</p>
            </div>
            <!-- End Stats -->

            <!-- Stats -->
            <div class="shadow-lg py-3 lg:shadow-none">
                <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-blue-100">Approved Applications</h4>
                <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-500 dark:text-yellow-500">{{ releasedApplications }}</p>
            </div>
            <!-- End Stats -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Features -->
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const page = usePage();

const pendingApplications = ref(page.props.pendingApplications);
const applications = ref(page.props.applications);
const releasedApplications = ref(page.props.releasedApplications);

function countUp(target, duration, item) {
    const increment = (target - item.value) / duration;
    let current =  item.value;

    const timer = setInterval(() => {
        current += increment;
        item.value = Math.round(current);

        if (current >= target) {
            clearInterval(timer);
            item.value = target;
        }
    }, 0); // Update interval to 500 milliseconds
}

onMounted(()=>{
    countUp(parseInt(page.props.pendingApplications) + 10000 , 200, pendingApplications);
    countUp(page.props.applications +  10000  , 200, applications );
    countUp(page.props.releasedApplications + 10000  , 200, releasedApplications );
})
</script>
