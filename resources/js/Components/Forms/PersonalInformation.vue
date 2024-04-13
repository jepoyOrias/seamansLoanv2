<template>
  <div>
    <h2 class="text-blue-900 dark:text-yellow-500 font-bold text-2xl mt-10 mb-3">Personal Information</h2>
    <div v-for="([key, value], index) in filteredEntries" :key="index">
      <div class="sm:col-span-3 my-2">
        <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200 uppercase">
          {{ value.label }} {{ value.required ? "*" : "" }}
        </label>
      </div>
      <InputText v-if="value.inputType === 'text'" class="my-3" v-model:model="personalInformation[key]" :field="key"
        :inputType="value.inputType" @input="validator.removeError(key)" :objValidator="validator" />
      <div v-else-if="value.inputType === 'date'">
        <vue-tailwind-datepicker @select-month="removeError()" v-model="personalInformation[key]" :formatter="{
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

      <div v-else-if="value.inputType === 'radio' && key === 'gender'">
        <div class="sm:flex" :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500 border':
        validator.hasError(key),
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':
        !validator.hasError(key),
      'py-0 px-4 block w-full rounded-lg text-sm relative': true,
    }">
          <label for="af-account-gender-checkbox-male" v-for="option in value.options" :key="option" :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500':
        validator.hasError(key),
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':
        !validator.hasError(key),
      'py-3 px-4 block w-full rounded-lg text-sm relative': true,
    }">
            <input v-model="selectedGender" :value="option" :type="value.inputType"
              @change="objValidator.removeError(key)" :name="`af-account-${option}-checkbox`"
              class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" />
            <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">
              {{ option }}
            </span>
          </label>
        </div>
        <div class="sm:col-span-3 my-2">
          <InputText v-if="selectedGender == 'Others'" class="my-3 py-3" v-model:model="personalInformation[key]"
            :field="key" :inputType="'text'" @input="validator.removeError(key)" :label="'Other Gender *'"
            :objValidator="validator" />
        </div>
        <div v-if="validator.hasError(key)">
          <p class="text-sm text-red-600 mt-2 dark:text-white" :id="`hs-validation-${key}-error-helper`">
            {{ validator.getError(key) }}
          </p>
        </div>
      </div>
      <div v-else-if="value.inputType === 'radio'">
        <div class="sm:flex" :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500 border':
        validator.hasError(key),
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':
        !validator.hasError(key),
      'py-0 px-4 block w-full rounded-lg text-sm relative': true,
    }">
          <label for="af-account-gender-checkbox-male" v-for="option in value.options" :key="option" :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500':
        validator.hasError(key),
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':
        !validator.hasError(key),
      'py-3 px-4 block w-full rounded-lg text-sm relative': true,
    }">
            <input v-model="personalInformation[key]" :value="option" :type="value.inputType"
              @change="objValidator.removeError(key)" :name="`af-account-${option}-checkbox`"
              class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" />
            <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">
              {{ option }}
            </span>
          </label>
        </div>
        <div v-if="validator.hasError(key)">
          <p class="text-sm text-red-600 mt-2 dark:text-white" :id="`hs-validation-${key}-error-helper`">
            {{ validator.getError(key) }}
          </p>
        </div>
      </div>
      <div v-else-if="value.inputType === 'selectOption'">
        <select :class="{
      'focus:border-red-500 focus:ring-red-500 border-red-500':
        validator.hasError(key),
      'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':
        !validator.hasError(key),
      'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true,
    }" :value="key" v-model="personalInformation[key]" @change="validator.removeError(key)">
          <option disabled>Open this select menu</option>
          <option v-for="(option, index) in value.options" :key="index" :value="option.value">
            {{ option.label }}
          </option>
        </select>
        <div v-if="validator.hasError(key)">
          <p class="text-sm text-red-600 mt-2 dark:text-white" :id="`hs-validation-${key}-error-helper`">
            {{ validator.getError(key) }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import VueTailwindDatepicker from "vue-tailwind-datepicker";
import { computed, ref, watchEffect } from "vue";
const personalInformation = defineModel("personalInformation", { default: {} });
const validator = defineModel("objValidator");

const filteredEntries = computed(() => {
  return Object.entries(validator.value.fields).filter(
    ([key, value]) => value.type === "personal_information"
  );
});

const selectedGender = ref("");
watchEffect(() => {
  if (selectedGender.value == "Others") {
    personalInformation.value.gender = "";
  } else {
    personalInformation.value.gender = selectedGender.value;
  }
});


</script>

<style scoped></style>
