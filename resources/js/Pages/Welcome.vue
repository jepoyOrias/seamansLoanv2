<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar/Navbar.vue';
import Hero from './Landing/Hero.vue';
import WhyUs from './Landing/WhyUs.vue';
import Counting from './Landing/Counting.vue';
import MyTeam from './Landing/MyTeam.vue'
import AboutUs from './Landing/AboutUs.vue';
import Feature from './Landing/Feature.vue';
import FeatureNavs from './Landing/FeatureNavs.vue';
import FAQ from './Landing/FAQ.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>

<template>

    <Head title="Welcome" />
    <Navbar />
    <section class="mt-[50px] sm:mt-[100px]">
        <Hero />
    </section>
    <section class="mt-[50px] sm:mt-[100px]">
        <Counting/>
    </section>
 
    <section class="mt-[50px] sm:mt-[100px]">
        <FeatureNavs/>
    </section>

    <section class="mt-[50px] sm:mt-[100px] dark:bg-yellow-500">
        <Feature/>
    </section>
    <section class="mt-[50px] sm:mt-[100px]">
        <AboutUs/>
    </section>
    <section class="mt-[50px] sm:mt-[100px]">
        <WhyUs/>
    </section>
    <section class="mt-[50px] sm:mt-[100px]">
        <FAQ/>
    </section>
    <section class="mt-[50px] sm:mt-[100px]">
        <MyTeam/>
    </section>
 
   


</template>

<style></style>
