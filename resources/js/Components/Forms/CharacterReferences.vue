<template>
  <div>
    <div class="mb-8">
      <h2 class="text-blue-900 dark:text-yellow-500 font-bold text-2xl mt-10 mb-3">CHARACTER REFERENCES (NOT LIVING IN THE SAME HOUSEHOLD)</h2>
    </div>
    <div v-for="(contact_references, index) in contactReferences" :key="index">

      <div class="my-3 text-lg font-bold  dark:text-white"> *Character Reference {{ index + 1 }} *</div>
      <hr class="mb-5">
      <div class="my-3">
        <label class="block text-sm font-medium mb-2 dark:text-white uppercase">Name</label>
        <input class="my-3" v-model="contact_references.name" label="Name *" inputType="text" :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500': validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index].name.length > 0 ? true : false,
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400': !validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index].name.length > 0 ? true : false,
      'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true
    }" />
        <div
          v-if="validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index].name.length > 0 ? true : false">
          <p v-for="(errors, index) in validator.$errors.length > 0 ? validator.loan.contact_references.$errors[0]?.$response.$errors[index].name : []"
            :key="index" class="text-sm text-red-600 mt-2 dark:text-slate-50" id="hs-validation-name-error-helper"> {{ errors.$message }}

          </p>
        </div>
      </div>
      <div class="my-3">
        <label class="block text-sm font-medium mb-2 dark:text-white uppercase">Address</label>
        <input v-model="contact_references.address" label="Address *" inputType="text" :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500': validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index].address.length > 0 ? true : false,
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400': !validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index].address.length > 0 ? true : false,
      'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true
    }" />
        <div
          v-if="validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index]?.address.length > 0 ? true : false">
          <p v-for="(errors, index) in validator.$errors.length > 0 ? validator.loan.contact_references.$errors[0]?.$response.$errors[index].address : []"
            :key="index" class="text-sm text-red-600 mt-2 dark:text-slate-50" id="hs-validation-name-error-helper"> {{ errors.$message }}
          </p>
        </div>
      </div>
      <div class="my-3">

        <label class="block text-sm font-medium mb-2 dark:text-white uppercase">Contact Number</label>
        <input class="my-3" v-model="contact_references.mobile_number" label="contact number*" inputType="text"
          :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500': validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index]?.mobile_number.length > 0 ? true : false,
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400': !validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index]?.mobile_number.length > 0 ? true : false,
      'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true
    }" />
      </div>

      <div
        v-if="validator.$dirty && validator.loan.contact_references.$errors[0]?.$response.$errors[index]?.mobile_number.length > 0 ? true : false">
        <p v-for="(errors, index) in validator.$errors.length > 0 ? validator.loan.contact_references.$errors[0]?.$response.$errors[index].mobile_number : []"
          :key="index" class="text-sm text-red-600 mt-2 dark:text-slate-50" id="hs-validation-name-error-helper"> {{ errors.$message }}
        </p>
      </div>
    </div>


  </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
const contactReferences = defineModel('contactReferences', { default: [] });
const validator = defineModel('validator')
console.log('validator from CB', validator)
</script>

<style scoped>
/* Your scoped styles here */
</style>
