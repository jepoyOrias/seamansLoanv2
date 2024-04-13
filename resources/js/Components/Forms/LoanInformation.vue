<template>
    <div>
        <h2 class="text-blue-900 dark:text-yellow-500 font-bold text-2xl mt-10 mb-3">Loan Information</h2>
        <div v-for="([key, value], index) in filteredEntries" :key="index">
            <div class="sm:col-span-3 my-2">
                <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200 uppercase">
                    {{ value.label }} {{ value.required ? '*' : '' }}
                </label>
            </div>
            <div v-if="value.inputType === 'selectOption' && key == 'loan_purpose'">
                <select :class="{
                    'focus:border-red-500 focus:ring-red-500 border-red-500': validator.hasError(key),
                    'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400': !validator.hasError(key),
                    'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true
                }" 
                     v-model="selectedPurpose" @change="GetSelectedOption(key)">
                    <option disabled> Open this select menu </option>
                    <option v-for="(option, index) in value.options " :key="index" :value="option.value"> {{
            option.label }} </option>
                </select>
                <InputText class="my-3" v-if="selectedPurpose == 'Others'" v-model:model="loanInformation[key]"
                    :field="key" label="other purpose *" :objValidator="validator"
                    @input="validator.removeError(key)" />
                <div v-if="validator.hasError(key)">
                    <p class="text-sm text-red-600 mt-2 dark:text-white " :id="`hs-validation-${key}-error-helper`">
                        {{ validator.getError(key) }}
                    </p>
                </div>
            </div>
            <div v-else-if="value.inputType === 'selectOption'">
                <select :class="{
            'focus:border-red-500 focus:ring-red-500 border-red-500': validator.hasError(key),
            'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400': !validator.hasError(key),
            'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent': true
        }" value="loan_purpose" v-model="loanInformation[key]" @change="validator.removeError($event,key)">
                    <option disabled> Open this select menu </option>
                    <option v-for="(option, index) in value.options " :key="index" :value="option.value"> {{
            option.label }} </option>
                </select>
                <div v-if="validator.hasError(key)">
                    <p class="text-sm text-red-600 mt-2 dark:text-white" :id="`hs-validation-${key}-error-helper`">
                        {{ validator.getError(key) }}
                    </p>
                </div>
            </div>
            <InputText v-else class="my-3" v-model:model="loanInformation[key]" :field="key" 
                v-model:objValidator="validator" @input="validator.removeError(key)" />

        </div>
    </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import { watchEffect, ref, computed, onMounted } from 'vue';

const loanInformation = defineModel('loanInformation', { default: {} })
const validator = defineModel('objValidator')

const filteredEntries = computed(() => {
    return Object.entries(validator.value.fields).filter(([key, value]) => value.type === 'loan_information');
});


const selectedPurpose = ref('');
onMounted(()=>{
    selectedPurpose.value =  loanInformation.value.loan_purpose;

})

const GetSelectedOption = ($event,key)=>{
    console.log($event);
    validator.value.removeError(key);
    if (selectedPurpose.value == 'Others') {
        loanInformation.value.loan_purpose = ''

    } else {
        loanInformation.value.loan_purpose = selectedPurpose.value
    }
}

</script>

<style scoped></style>