<template>
    <div>
        <div class="sm:col-span-9">
          <div class="sm:col-span-9">
            <h2 for="file-input" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
            CONTRACT
          </h2>
          </div>
        </div>
        <div class="sm:col-span-9">
          <label for="small-file-input" class="sr-only">Choose file</label>
          <input ref="contract" @change="(event) => handleFileUpload(event,'contract')"
          type="file" name="small-file-input" id="small-file-input" 
          :class="{'focus:border-red-500 focus:ring-red-500 border-red-500': validator.loan.requirements.contract.$error}"
          class="block w-full border border-gray-200 shadow-sm 
          rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
           dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
            file:bg-gray-50 file:border-0
            file:me-4
            file:py-2 file:px-4
            dark:file:bg-gray-700 dark:file:text-gray-400">
        </div>
        <div v-if="validator.loan.requirements.contract.$error">
                     <p v-for="(error, index) in validator.loan.requirements.contract.$errors" :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
                     </div>
        

        
    </div>
</template>

<script setup>
import { ref } from "vue"


    const requirements = defineModel('requirements',{default:{}});
    const contract = ref(null);
    const seaman_book = ref(null);
    const e_reg = ref(null);
    const sirb = ref(null);
    const bill = ref(null);
    const valid_id_1 = ref(null);
    const valid_id_2 = ref(null);
    const marriage_contract = ref(null);
    const send_it_thru = ref(null);
    const validator = defineModel('validator')
    
    const handleFileUpload = (event,fieldName) => {
      requirements.value[fieldName] = event.target.files[0];
      
    }
  
   

</script>

<style scoped>

</style>