<template>
    <div>
        <div class="sm:col-span-3">
                <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    LOAN PURPOSE *
                </label>
            </div>
        <div>
            <select class="py-3 px-4 block w-full rounded-lg text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
             value="loan_purpose"
                 v-model="selectedPurpose" 
                 
                :hasError="selectedPurpose != 'Others' && validator.loan.loan_information.loan_purpose.$error"
                :errors="validator.loan.loan_information.loan_purpose.$errors">
                <option disabled > Open this select menu </option>
                <option v-for="(option, index) in options " :key="index" :value="option.value"> {{ option.label }} </option> 
            </select> 
        </div>
              
        <div v-if="selectedPurpose != 'Others'">
                        <p v-for="(error, index) in validator.loan.loan_information.loan_purpose.$errors" :key="index" 
                        class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                        </p>
        </div>
        
        <InputText 
                class="my-3" v-if="selectedPurpose == 'Others'" 
                 v-model:model="loanInformation.loan_purpose"
                    label="other purpose *"
                    :hasError="validator.loan.loan_information.loan_purpose.$error"
                     :errors="validator.loan.loan_information.loan_purpose.$errors"
                    inputType="text"
                  />

                 
         <InputText 
            class="my-3"
            v-model:model="loanInformation.amount"
            label="loan Amount *"
            :hasError="validator.loan.loan_information.amount.$error"
            :errors="validator.loan.loan_information.amount.$errors"
            inputType="text"
            /> 
            <div class="sm:col-span-3">
                <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    TERM *
                </label>
            </div>
            <div>
            <select class="py-3 px-4 block w-full rounded-lg text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
             value="term_months"
             v-model="loanInformation.term_months" 
                :hasError="validator.loan.loan_information.term_months.$error"
                :errors="validator.loan.loan_information.term_months.$errors">
                <option seleted="" > Open this select menu</option>
                <option v-for="(option, index) in options2 " :key="index" :value="option.value"> {{ option.label }} </option> 
            </select> 
        </div>
        <div >
                        <p v-for="(error, index) in validator.loan.loan_information.term_months.$errors" :key="index" 
                        class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                        </p>
        </div>
            
            

    </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import { watchEffect,ref } from 'vue';

    const loanInformation = defineModel('loanInformation',{default:{}})
    const validator = defineModel('validator')
    console.log('validator from LI',validator)

    const options = [
        {
            label:'PERSONAL/FAMILY EXPENSES',
            value:'Personal/Family Expenses',
        },
        {
            label:'HOME PURCHASE/DEVELOPMENT',
            value:'Home Purchase/Development',
        },
        {
            label:'HOUSE RENOVATION',
            value:'House Renovation',
        },
        
        {
            label:'LAND PURCHASE/DEVELOPMENT',
            value:'Land Purchase/Development',
        },
        {
            label:'VEHICLE PURCHASE',
            value:'Vehile Purchase',
        },
        {
            label:'WORKING CAPITAL/BUSINESS CAPITAL',
            value:'Working Capital/Business Capital',
        },
        {
            label:'EDUCATIONAL ASSISTANCE',
            value:'Educational Assistance',
        },
        {
            label:'MEDICAL ASSISTANCE',
            value:'Medical Assistance',
        },
        {
            label:'APPLIANCES / ASSET PURCHASE',
            value:'Appliaces/Asset Purchase',
        },
        {
            label:'OTHERS',
            value:'Others',
        },
    ]
    const options2 = [
        {
            label:'1 MONTH',
            value:'1 Month',
        },
        {
            label:'2 MONTHS',
            value:'2 Months',
        },
        {
            label:'3 MONTHS',
            value:'3 Month',
        },
        {
            label:'4 MONTHS',
            value:'4 Months',
        },
        {
            label:'5 MONTHS',
            value:'5 Months',
        },
        {
            label:'6 MONTHS',
            value:'6 Months',
        },
        {
            label:'7 MONTHS',
            value:'7 Months',
        },
        {
            label:'8 MONTHS',
            value:'8 Months',
        },
        {
            label:'9 MONTHS',
            value:'9 Months',
        },
        {
            label:'10 MONTHS',
            value:'10 Months',
        },
        {
            label:'11 MONTHS',
            value:'11 Months',
        },
        {
            label:'12 MONTHS',
            value:'12 Months',
        },
    ]

        const selectedPurpose = ref('');
    watchEffect(() => {
      if(selectedPurpose.value == 'Others' ){
        loanInformation.value.loan_purpose = ''

      }else{
        loanInformation.value.loan_purpose = selectedPurpose.value
      }
      
    });
</script>

<style scoped>

</style>