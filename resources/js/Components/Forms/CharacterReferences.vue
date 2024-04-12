<template>
  <div>
    <div class="mb-8">
      <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
        CHARACTER REFERENCES (NOT LIVING IN THE SAME HOUSEHOLD)
      </h2>
    </div>
    <div v-for="(character_references, index) in characterReferences" :key="index">
      
      <div class="my-3 text-lg font-bold" >Reference {{ index + 1 }}</div>
      <InputText 
          
          class="my-3"
          v-model:model="character_references.name"
          label="Name *"
          inputType="text"   
          
          :hasError="validator.$dirty && validator.loan.character_references.$errors[0]?.$response.$errors[index].name.length > 0 ? true : false "
          :errors=" validator.$errors.length > 0 ? validator.loan.character_references.$errors[0]?.$response.$errors[index].name : [] "
      />
      <InputText 
          class="my-3"
          v-model:model="character_references.address"
          label="Address *"
          inputType="text"   
          :hasError="validator.$dirty && validator.loan.character_references.$errors[0]?.$response.$errors[index].address.length > 0 ? true : false "
          :errors=" validator.$errors.length > 0 ? validator.loan.character_references.$errors[0]?.$response.$errors[index].address : [] "
      />
      <InputText 
          class="my-3"
          v-model:model="character_references.contact_number"
          label="contact number*"
          inputType="text"   
          :hasError="validator.$dirty && validator.loan.character_references.$errors[0]?.$response.$errors[index].contact_number.length > 0 ? true : false "
          :errors=" validator.$errors.length > 0 ? validator.loan.character_references.$errors[0]?.$response.$errors[index].contact_number : [] "
           
      />
      </div>
  </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
const characterReferences = defineModel('characterReferences', { default: [] });
const validator = defineModel('validator')
  console.log('validator from CB', validator)
</script>

<style scoped>
/* Your scoped styles here */
</style>
