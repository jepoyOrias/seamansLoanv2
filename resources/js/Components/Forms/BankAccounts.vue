<template>
   <div>
      <div>
         <h2 class="text-blue-900 dark:text-yellow-500 font-bold text-2xl mt-10 mb-3">Bank Information</h2>
         <div v-for="([key, value], index) in filteredEntries" :key="index">
            <div class="sm:col-span-3 my-2">
               <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200 uppercase">
                  {{ value.label }} {{ value.required ? "*" : "" }}
               </label>
            </div>
            <InputText v-if="value.inputType === 'text'" class="my-3" v-model:model="bankAccounts[key]" :field="key"
               :inputType="value.inputType" @input="validator.removeError(key)" :objValidator="validator" />
            <div v-else-if="value.inputType === 'date'">
               <vue-tailwind-datepicker v-model="bankAccounts[key]" :formatter="{
            date: 'MMMM DD, YYYY',
            month: 'MMMM',
         }" as-single :input-classes="{
            'focus:border-red-500 focus:ring-red-500 border-red-500':
               validator.hasError(key),
            'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':
               !validator.hasError(key),
            'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true,
         }" :placeholder="value.label" />
               <div v-if="validator.hasError(key)">
                  <p class="text-sm text-red-600 mt-2 dark:text-white" :id="`hs-validation-${key}-error-helper`">
                     {{ validator.getError(key) }}
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import VueTailwindDatepicker from "vue-tailwind-datepicker";
import { computed, ref, watchEffect } from "vue";
const bankAccounts = defineModel('bankAccounts', { default: {} })
const validator = defineModel("objValidator");

const filteredEntries = computed(() => {
   return Object.entries(validator.value.fields).filter(
      ([key, value]) => value.type === "releasings"
   );
});

console.log(filteredEntries);


</script>

<style scoped></style>