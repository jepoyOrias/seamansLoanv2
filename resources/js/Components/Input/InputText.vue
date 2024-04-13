<template>
    <div>
         <label :for="props.label" class="block text-sm font-medium mb-2 dark:text-white uppercase">{{ props.label }}</label>
             <div class="relative">
                 <input v-model="model" :type="inputType" :id="props.label"
                 :class="{
                        'focus:border-red-500 focus:ring-red-500 border-red-500': props.objValidator.hasError(props.field),
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400': !props.objValidator.hasError(props.field),
                        'py-3 px-4 block w-full rounded-lg text-sm relative dark:text-white dark:bg-gray-800 bg-transparent':true
                    }"
                  >
             </div>
             <div v-if="objValidator.hasError(props.field)">
                 <p class="text-sm text-red-600 mt-2 dark:text-white" :id="`hs-validation-${field}-error-helper`">
                    {{ objValidator.getError(props.field) }}
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
        inputType: {
            type: String,
            default: 'text'
        },
        objValidator: {
            type:Object,
        },
        field :{
            type: String,
        }
 });

 
     
 </script>
 
 <style scoped>
 
 </style>