<template>
  <div class="max-w-[85rem] mx-auto px-4 md:px-6">
    <!-- Grid -->
    <!-- Slider -->
    <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true,
    "speed" : 10000,
    "isInfiniteLoop": true
  }' class="relative bg-blue-wave rounded-3xl">
      <div class="hs-carousel relative overflow-hidden w-full min-h-[450px] bg-transparent rounded-lg">
        <div
          class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
          <div class="hs-carousel-slide">
            <div class="flex justify-between h-full pt-5 px-6 relative z-10">
              <div class="lg:max-w-[60%] py-2 lg:py-10 px-10">
                <h2 class="block text-xl font-bold text-slate-100 sm:text-4xl md:text-4xl md:leading-tight dark:text-white">Welcome to Seaman Loan Express:</h2>
                <h2 class="block text-xl font-bold text-yellow-500 sm:text-4xl md:text-4xl  pb-3">"Basta Loan, Mabilis Dito"</h2>
                <p class="my-5 text-slate-50 text-md sm:text-lg md:text-xl">Experience the benefits of our exclusive loan offer with
                  remarkably low interest rates,
                  fast approval process, and the added advantage of zero cash out requirement.</p>
                <div class="mt-7 grid gap-3 w-full md:inline-flex">
                  <button class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-lg font-semibold rounded-lg border border-transparent bg-yellow-500 text-blue-900  disabled:opacity-50 disabled:pointer-events-none"
                    @click="isApplyNowModal = true">
                    Apply na!
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </button>
                  <button class="py-3 px-4 hidden md:inline-flex justify-center items-center gap-x-2 text-lg font-medium rounded-lg border border-gray-200 bg-transparent text-slate-100 shadow-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800"
                    type="button" @click="scrollToELements('contact_us_section')">
                    Get in touch with us
                </button>
                </div>
              </div>
              <div class="md:flex md:justify-between min-w-[600px] z-[-1] w-[50%] absolute bottom-0 right-0">
                <img src="../../assets/images/carousel/Image_1.png" class="-z-10 hidden lg:block scale-125" alt="">
              </div>
            </div>
          </div>
          <div class="hs-carousel-slide">
            <div class="flex justify-between h-full pt-5 px-6 relative z-10">
              <div class="lg:max-w-[60%] py-2 lg:py-10 px-10 ">
                <h2 class="block text-xl font-bold text-slate-100 sm:text-4xl md:text-4xl md:leading-tight dark:text-white">Attain peace of mind and secure your financial future with our <span class="text-yellow-500">tailored solutions.</span></h2>
                <p class="my-5 text-slate-50 text-md sm:text-lg md:text-xl">Whether you're planning for retirement, building an emergency fund, or investing for the long term, we're here to guide you every step of the way. Start your journey to financial freedom today.</p>
                <div class="mt-7 grid gap-3 w-full md:inline-flex">
                  <button class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-lg font-semibold rounded-lg border border-transparent bg-yellow-500 text-blue-900  disabled:opacity-50 disabled:pointer-events-none"
                    @click="isApplyNowModal = true">
                    Apply na!
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path d="m9 18 6-6-6-6"></path>
                    </svg>
                  </button>
                  <button class="py-3 px-4 hidden md:inline-flex justify-center items-center gap-x-2 text-lg font-medium rounded-lg border border-gray-200 bg-transparent text-slate-100 shadow-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800"
                    type="button" @click="scrollToELements('contact_us_section')">
                    Get in touch with us
                </button>
                </div>
              </div>
              <div class="md:flex md:justify-between min-w-[600px] z-[-1] w-[50%] absolute bottom-0 right-0">
                <img src="../../assets/images/carousel/Image_3.png" class="-z-10 hidden lg:block scale-125" alt="">
              </div>
            </div>
          </div>
          <div class="hs-carousel-slide">
            <div class="flex justify-between h-full pt-5 px-6 relative z-10">
              <div class="lg:max-w-[60%] py-2 lg:py-10 px-10">
                <h2 class="block text-xl font-bold text-slate-100 sm:text-4xl md:text-4xl md:leading-tight dark:text-white">Seaman Loan Express proudly collaborates with <span class="text-yellow-500">Global SME Loans Inc.</span></h2>
                <p class="my-5 text-slate-50 text-md sm:text-lg md:text-xl">
                  Our partnership aims to cater to the unique financial needs of individuals working in maritime and overseas sectors, offering tailored loan solutions that prioritize convenience, flexibility, and affordability.
                </p>
                <div class="mt-7 grid gap-3 w-full md:inline-flex">
                  <button class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-lg font-medium rounded-lg border border-gray-200 bg-transparent text-slate-100 shadow-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800"
                    type="button" @click="scrollToELements('contact_us_section')">
                    Get in touch with us
                  </button>
                </div>
              </div>
              <div class="md:flex md:justify-between min-w-[450px] z-[-1] w-[15%] absolute top-[50%] translate-y-[-55%] right-20">
                <img src="../../assets/images/carousel/gsli-white.png" class="-z-10 hidden lg:block" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="button"
        class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0  top-[50%] inline-flex justify-center items-center w-[50px] h-[50px] rounded-full hover:bg-yellow-500 text-slate-100 hover:text-blue-900 ms-3">
        <span class="text-xl" aria-hidden="true">
          <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
          </svg>
        </span>
        <span class="sr-only">Previous</span>
      </button>
      <button type="button"
        class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 top-[50%] end-0 inline-flex justify-center items-center w-[50px] h-[50px] rounded-full hover:bg-yellow-500 text-slate-100 hover:text-blue-900 me-3">
        <span class="sr-only">Next</span>
        <span class="text-xl" aria-hidden="true">
          <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </span>
      </button>

      <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
        <span
          class="hs-carousel-active:bg-yellow-500 hs-carousel-active:border-yellow-500 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
        <span
          class="hs-carousel-active:bg-yellow-500 hs-carousel-active:border-yellow-500 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
        <span
          class="hs-carousel-active:bg-yellow-500 hs-carousel-active:border-yellow-500 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
      </div>
    </div>
    <!-- End Slider -->
    <!-- End Grid -->
  </div>
</template>

<script setup>

const isApplyNowModal = defineModel('isApplyNowModal');
const emit = defineEmits(['scrollToELements']);


const scrollToELements = (id) =>{
  emit('scrollToELements', id);
}


</script>

<style scoped>
.bg-blue-wave {
  background-image: url('../../assets/images/carousel/6.png');
  background-size: cover;
  background-repeat: no-repeat;
}

</style>