<template>
    <div :class="className">
         <label :for="props.label" class="block text-sm font-medium mb-2 dark:text-white">{{ props.label }}</label>
             <div class="relative">
                 <input v-model="model" :type="inputType" :id="props.label"
                     :class="{'focus:border-red-500 focus:ring-red-500 border-red-500': hasError}"
                     class="py-3 px-4 block w-full rounded-lg text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" 
                  >
                 <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3" v-if="hasError">
                 <svg class="flex-shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" 
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                 stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                 </div>
             </div>
             <div v-if="props.hasError">
                 <p v-for="(error, index) in props.errors" :key="index" 
                 class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                 {{ error.$message }}
              </p>
             </div>
     </div>
 </template>
 
 <script setup>

 const model = defineModel('model');
 const props = defineProps({
        label:{
            type: String,
        },
        hasError:{
            type:Boolean,
            default: false
        },
        errors: {
            type: Array,
            default: []
        },
        inputType: {
            type: String,
            default: 'text'
        },
        className:{
            type:String
        }
 })
     
 </script>
 
 <style scoped>
 
 </style>