<template>
    <div>
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                INCOME INFORMATION
            </h2>
        </div>
            <div class="sm:col-span-3">
                <label for="af-account-name_of_employer_business" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    NAME OF EMPLOYER / BUSINESS
                </label>
            </div>
            <InputText 
                class="my-3"
                v-model:model="incomeInformation.name_of_employer"
                label="Employer*"
                :hasError="validator.loan.employer_information.name_of_employer.$error"
                :errors="validator.loan.employer_information.name_of_employer.$errors"
                inputType="text"    
            />
           
            <InputText 
                class="my-3"
                v-model:model="incomeInformation.position"
                label="position*"
                :hasError="validator.loan.employer_information.position.$error"
                :errors="validator.loan.employer_information.position.$errors"
                inputType="text"    
            />
            <InputText 
                class="my-3"
                v-model:model="incomeInformation.office_address"
                label="Office address*"
                :hasError="validator.loan.employer_information.office_address.$error"
                :errors="validator.loan.employer_information.office_address.$errors"
                inputType="text"    
            />
    </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
const incomeInformation = defineModel ('incomeInformation',{default:{}})
const validator = defineModel('validator')
console.log('validator from PI',validator)
</script> 

<style scoped>

</style>