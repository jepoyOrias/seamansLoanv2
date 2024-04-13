<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar/Navbar.vue';
import Hero from './Landing/Hero.vue';
import WhyUs from './Landing/WhyUs.vue';
import Counting from './Landing/Counting.vue';
import MyTeam from './Landing/MyTeam.vue'
import AboutUs from './Landing/AboutUs.vue';
import AboutUs2 from './Landing/AboutUs2.vue';
import Feature from './Landing/Feature.vue';
import FeatureNavs from './Landing/FeatureNavs.vue';
import FAQ from './Landing/FAQ.vue';
import Featrue2 from './Landing/Feature2.vue'
import Featrue3 from './Landing/Feature3.vue'
import Footer from '@/Components/Footer/Index.vue';
import SignaturePad from '@/Components/SignaturePad/Index.vue'
import ApplyModal from '@/Components/Apply/ApplyModal.vue';
import { useVuelidate } from '@vuelidate/core'
import { required, email, helpers } from '@vuelidate/validators'
import ContactUs from './Landing/ContactUs.vue'
import {onMounted, onUnmounted, onUpdated, ref, watch, watchEffect} from 'vue';
import VueTailwindDatePicker from 'vue-tailwind-datepicker';
const isApplyNowModal = ref(false);
defineProps({
  canLogin: {
    type: Boolean,
  },
});
const currentStep = ref(1);

const scrollHeight = ref(0);
const page = usePage();
const activeSection = ref('');

const handleScroll = ()=>{
  scrollHeight.value = window.scrollY;
 
}



onMounted(()=>{
  const id = page.url.replace(/\/\?section=/, '');
  window.addEventListener('scroll', handleScroll);
  activeSection.value = id;
  scrollToELements();
});





onUnmounted(()=>{
  window.removeEventListener('scroll', handleScroll);
});

const scrollToTop = ()=>{
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
  activeSection.value = "";
}



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




const persons = ref({
      lastname:"",
      personName: [
        { name: '', address: '' },
      ]
    });


    const rules1 ={
      persons: {
       lastname:{required},
      }
    }
    const rules = {
      persons: {
        personName: {
          $each: helpers.forEach({
            name: { required  },
            address: { required  },
          })
        }
      }
    };

    const validator = useVuelidate(rules1, { persons });
    const validator1 = useVuelidate(rules, { persons });
    const SubmitForm = () => {
      validator.value.$touch();
        if (currentStep.value === 2) {
          validator1.value.$touch();
        }
        if (validator.value.$error || validator1.value.$error) {
          console.log(validator1.value.$errors[0].$response.$errors[0].name.length);
          console.log(validator1.$errors[index].$response.$errors[0].address.$message, "test");
        } else {
          currentStep.value++;
         
        }
    };

</script>

<template>

  <Head title="Welcome" />
    <Navbar :canLogin="canLogin" :activePath="$page.url" @scrollToELements="scrollToELements" v-model:activeSection="activeSection" v-model:isApplyNowModal="isApplyNowModal"/>
    <section class="mt-[50px] sm:mt-[100px]" >
      <Hero @scrollToELements="scrollToELements" v-model:isApplyNowModal="isApplyNowModal"/>
    </section>
  <section class="mt-[50px] sm:mt-[100px]">
    <Featrue2 />
  </section>
  <section class="mt-[50px] sm:mt-[100px]">
    <Featrue3 />
  </section>

  <section class="mt-[50px] sm:mt-[100px]" id="qualification-requirements">
    <WhyUs />
    <FeatureNavs />
   
  </section>

  <section class="mt-0 sm:mt-[80px]">
    <Counting />
  </section>

  <section class="mt-[50px] sm:mt-[100px] bg-slate-100 dark:bg-transparent" id="how-to-apply">
    <AboutUs2/>
  </section>
  <section id="about-us" class="mt-[50px] sm:mt-[100px] bg-waves2 relative overflow-hidden
     before:absolute before:top-0 before:start-1/2
     before:bg-no-repeat before:bg-top before:bg-cover dark:before:opacity-30 before:size-full before:-z-[1] before:transform before:-translate-x-1/2 sm:before:-rotate-120 before:-rotate-0 ">
    <AboutUs />
  </section>

  <section class="mt-[50px] sm:mt-[100px]">
    <FAQ />
  </section>

  <section class="mt-[50px] sm:mt-[100px]">
    <ContactUs />
  </section>
  <div class="fixed right-9 z-50 top-[90%]" v-if="scrollHeight > 500" >
    <button type="button" @click="scrollToTop"  class="flex rounded-full flex-shrink-0 justify-center items-center gap-2 size-[62px] text-sm font-semibold  border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up shrink-0 size-8"><line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg>
  </button> 
  </div>

<Footer :activePath="$page.url" @scrollToELements="scrollToELements" v-model:activeSection="activeSection"/>


</template>

<style>
.modal-open{
    overflow: hidden;
}
</style>
