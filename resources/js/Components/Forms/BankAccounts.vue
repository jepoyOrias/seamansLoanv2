<template>
  <div>
     <div class="my-5">
            <h2>BANK ACCOUNTS</h2>
          
            <InputText 
                    class="my-3"
                    v-model:model="bankAccounts.bank"
                    label="bank *"
                    :hasError="validator.loan.releasings.bank.$error"
                    :errors="validator.loan.releasings.bank.$errors"
                    inputType="text" 
                    />
                    <InputText 
                    class="my-3"
                    v-model:model="bankAccounts.branch"
                    label="branch *"
                    :hasError="validator.loan.releasings.branch.$error"
                    :errors="validator.loan.releasings.branch.$errors"
                    inputType="text" 
                    />
                    <!-- <InputText 
                    class="my-3"
                    v-model:model="bankAccounts.date_opened"
                    label="date opened *"
                    :hasError="validator.loan.releasings.date_opened.$error"
                    :errors="validator.loan.releasings.date_opened.$errors"
                    inputType="text" 
                    /> -->
                    <div>
            <label class="block text-sm font-medium mb-2 dark:text-white uppercase">Date Opened *</label>
                <VueTailwindDatepicker v-model="bankAccounts.date_opened" :formatter="{
                        date: 'MMMM DD, YYYY',
                        month: 'MMMM',
                    }" as-single
                     :input-classes="{
                        'focus:border-red-500 focus:ring-red-500 border-red-500': validator.loan.releasings.date_opened.$error,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.loan.releasings.date_opened.$error,
                        'py-3 px-4 block w-full rounded-lg text-sm relative':true

                        }"
                     
                    placeholder="DATE OPEN" />
                    <div v-if="validator.loan.releasings.date_opened.$error">
                     <p v-for="(error, index) in validator.loan.releasings.date_opened.$errors" :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
                     </div>
        </div>
                    <InputText 
                    class="my-3"
                    v-model:model="bankAccounts.account_type"
                    label="account type*"
                    :hasError="validator.loan.releasings.account_type.$error"
                    :errors="validator.loan.releasings.account_type.$errors"
                    inputType="text" 
                    />
                    <InputText 
                    class="my-3"
                    v-model:model="bankAccounts.account_number"
                    label="account number*"
                    :hasError="validator.loan.releasings.account_number.$error"
                    :errors="validator.loan.releasings.account_number.$errors"
                    inputType="text" 
                    />
    </div>
  </div>
</template> 

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import VueTailwindDatepicker from "vue-tailwind-datepicker";
const bankAccounts = defineModel('bankAccounts',{default:{}})
const validator = defineModel('validator')
console.log('validator from BA',validator)

</script>

<style scoped>

</style>