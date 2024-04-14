<script setup>
import { format } from 'date-fns';
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3';

const menus = ref([
  {
    title: 'Navigations',
    items: [
      { text: 'Home', link: '/', scrollTo: 'home', preserveScroll:true },
      { text: 'Track Your Application', link: 'search-reference', scrollTo: ''  ,isRoute: true, preserveScroll:false },
      { text: 'Qualification & Requirements', link: '/?section=qualification-requirements', scrollTo: 'qualification-requirements', preserveScroll:true },
      { text: 'How To Apply', link: '?section=how-to-apply' , scrollTo: '/how-to-apply'}
    ]
  },
  {
    title: 'Company',
    items: [
      { text: 'About Us', link: '/?section=about-us', scrollTo: 'about-us',preserveScroll:true },
      { text: 'Contact & Support', link: '/?section=contact_us_section', scrollTo: 'contact_us_section',preserveScroll:true },
      { text: 'Privacy Policy', link: 'privacy-policy',preserveScroll:false }
    ]
  },
])
const emit = defineEmits(['scrollToELements']);
const activeSection = defineModel('activeSection');

const scrollToELements = (id) =>{
    activeSection.value = id;
  emit('scrollToELements', id);
}

</script>

<template>
  <!-- ====== Footer Section Start -->
  <footer class="mt-auto dark:bg-slate-900 w-full relative">
   <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 lg:pt-20 mx-auto ">
      <div class="flex flex-wrap -mx-4 gap-[20px]">
        <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
          <div class="w-full mb-10">
            <Link
                    preserve-scroll
                    class="lg:order-1 flex gap-5 items-center text-lg text-nowrap font-semibold dark:text-white text-blue-900 relative"
                    :href="'/'"
                    @click.prevent="scrollToELements('home')">
                  <img class="w-20 h-auto dark:hidden" src="../../assets/images/logo.png" alt="logo">
                  <img class="w-20 h-auto hidden dark:block" src="../../assets/images/logo-white.png" alt="logo">
                  Seaman Loan Express
                  </Link>
          </div>
        </div>

        <div v-for="menu in menus" :key="menu.title" class="w-full sm:w-1/2 lg:w-2/12">
          <div class="w-full mb-10 px-5">
            <h4 class="text-lg font-semibold text-dark dark:text-white mb-9">{{ menu.title }}</h4>
            <ul class="space-y-3">
              <li v-for="item in menu.items" :key="item.text">
                <Link
                    :preserve-scroll="item.preserveScroll"
                    :href="item.link"
                    class="inline-block text-base leading-loose text-body-color hover:text-primary  cursor-pointer dark:text-slate-50"
                    @click.prevent="scrollToELements(scrollTo)"
                  >
                    {{ item.text }}
              </Link>
              </li>
            </ul>
          </div>
        </div>

        <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
          <div class="w-full mb-10">
            <h4 class="text-lg font-semibold text-dark dark:text-white mb-9">Follow Us On</h4>
            <div class="flex items-center mb-6">
              <a
                href="https://www.facebook.com/seamanloanexpress"
                target="_blank"
                class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:text-yellow-500 dark:text-white hover:text-blue-900 d sm:mr-4 lg:mr-3 xl:mr-4"
              >
                <svg width="8" height="16" viewBox="0 0 8 16" class="fill-current">
                  <path
                    d="M7.43902 6.4H6.19918H5.75639V5.88387V4.28387V3.76774H6.19918H7.12906C7.3726 3.76774 7.57186 3.56129 7.57186 3.25161V0.516129C7.57186 0.232258 7.39474 0 7.12906 0H5.51285C3.76379 0 2.54609 1.44516 2.54609 3.5871V5.83226V6.34839H2.10329H0.597778C0.287819 6.34839 0 6.63226 0 7.04516V8.90323C0 9.26452 0.243539 9.6 0.597778 9.6H2.05902H2.50181V10.1161V15.3032C2.50181 15.6645 2.74535 16 3.09959 16H5.18075C5.31359 16 5.42429 15.9226 5.51285 15.8194C5.60141 15.7161 5.66783 15.5355 5.66783 15.3806V10.1419V9.62581H6.13276H7.12906C7.41688 9.62581 7.63828 9.41935 7.68256 9.10968V9.08387V9.05806L7.99252 7.27742C8.01466 7.09677 7.99252 6.89032 7.85968 6.68387C7.8154 6.55484 7.61614 6.42581 7.43902 6.4Z"
                  />
                </svg>
              </a>
            </div>
            <p class="text-base text-body-color  dark:text-slate-50">&copy; {{ format(new Date(), 'Y') }} Seaman Loan Express</p>
          </div>
        </div>
      </div>
    </div>
    <div>
      <span class="absolute left-0 bottom-0 z-[-1]">
        <svg
          width="217"
          height="229"
          viewBox="0 0 217 229"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
            fill="url(#paint0_linear_1179_5)"
          />
          <defs>
            <linearGradient
              id="paint0_linear_1179_5"
              x1="76.5"
              y1="281"
              x2="76.5"
              y2="1.22829e-05"
              gradientUnits="userSpaceOnUse"
            >
              <stop stop-color="#3056D3" stop-opacity="0.08" />
              <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </span>
      <span class="absolute top-10 right-10 z-[-1]">
        <svg
          width="75"
          height="75"
          viewBox="0 0 75 75"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
            fill="url(#paint0_linear_1179_4)"
          />
          <defs>
            <linearGradient
              id="paint0_linear_1179_4"
              x1="-1.63917e-06"
              y1="37.5"
              x2="75"
              y2="37.5"
              gradientUnits="userSpaceOnUse"
            >
              <stop stop-color="#13C296" stop-opacity="0.31" />
              <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </span>
    </div>
  </footer>
  <!-- ====== Footer Section End -->
</template>
