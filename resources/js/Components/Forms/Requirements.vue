<template>
   <div>
      <h2 class="text-blue-900 dark:text-yellow-500 font-bold text-2xl mt-10 mb-3">Requirements Information</h2>
      <div v-for="([key, value], index) in filteredEntries" :key="index" class="my-3">
         <div v-if="key !== 'signature'">
            <div class="sm:col-span-3 my-2">
               <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200 uppercase">
                  {{ value.label }} {{ value.required ? "*" : "" }}
               </label>
            </div>
            <div class="sm:col-span-9">
               <label for="small-file-input" class="sr-only">Choose file</label>
               <input :ref="key" @change="(event) => handleFileUpload(event, key)" type="file" name="small-file-input"
                  id="small-file-input"
                  :class="{ 'focus:border-red-500 focus:ring-red-500 border-red-500': validator.hasError(key) }" class="block w-full border border-gray-200 shadow-sm 
          rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
           dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
            file:bg-gray-50 file:border-0
            file:me-4
            file:py-2 file:px-4
            dark:file:bg-gray-700 dark:file:text-gray-400">
            </div>
         </div>

         <div v-else>
            <div class="sm:col-span-3 my-2">
                  <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200 uppercase">
                     {{ value.label }} {{ value.required ? "*" : "" }}
                  </label>
               </div>
            <div>
               <label class="ps-4">
                  <input type="radio" value="file" v-model="selectedSignatureTypeUpload" :name="key" class="me-1"> Upload File
               </label>
               <label class="ps-4">
                  <input type="radio" value="signature" v-model="selectedSignatureTypeUpload" :name="key" class="me-1"> Provide Signature
               </label>
            </div>
            <div v-if="selectedSignatureTypeUpload == 'file'" class="mt-5">
            
               <div class="sm:col-span-9">
                  <label for="small-file-input" class="sr-only">Choose file</label>
                  <input :ref="key" @change="(event) => handleFileUpload(event, key)" type="file" name="small-file-input"
                     id="small-file-input"
                     :class="{ 'focus:border-red-500 focus:ring-red-500 border-red-500': validator.hasError(key) }" class="block w-full border border-gray-200 shadow-sm 
          rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
           dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
            file:bg-gray-50 file:border-0
            file:me-4
            file:py-2 file:px-4
            dark:file:bg-gray-700 dark:file:text-gray-400">
               </div>
            </div>
            <div v-if="selectedSignatureTypeUpload == 'signature'">
               <VueSignaturePad ref="signaturePadRef" class="border my-5 min-h-[200px]"></VueSignaturePad>
               <button  @click="undo" type="button" class="py-3 px-4 mx-1 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-600 hover:bg-blue-100 hover:text-blue-900 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:bg-blue-800/30 dark:hover:text-blue-400">
                  Undo
               </button>
               <button  @click="saveSignature(key)" type="button" class="py-3 px-4 mx-1 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-600 hover:bg-blue-100 hover:text-blue-900 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:bg-blue-800/30 dark:hover:text-blue-400">
                  Save Signature
               </button>
            </div>

         </div>

      </div>


   </div>
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import {VueSignaturePad} from 'vue-signature-pad'
import { ref, computed, watchEffect } from "vue"


const requirements = defineModel('requirements', { default: {} });
const selectedSignatureTypeUpload = ref('File');
const signaturePadRef = ref(null);
const validator = defineModel("objValidator");

const handleFileUpload = (event, fieldName) => {
   requirements.value[fieldName] = event.target.files[0];

}

watchEffect(()=>{
   selectedSignatureTypeUpload.value;
});

const undo = () => {
      if (signaturePadRef.value) {
        signaturePadRef.value.undoSignature();
      }
};

const saveSignature = (fieldName)=>{
   console.log(signaturePadRef.value);
   const {data} = signaturePadRef.value[0].saveSignature();
   const file = dataURLtoFile(data, 'signature.png');
   requirements.value[fieldName]  = file
}


const dataURLtoFile = (dataURL, filename) => {
      const arr = dataURL.split(',');
      const mime = arr[0].match(/:(.*?);/)[1];
      const bstr = atob(arr[1]);
      let n = bstr.length;
      const u8arr = new Uint8Array(n);
      while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
      }
      return new File([u8arr], filename, { type: mime });
    };

const filteredEntries = computed(() => {
   return Object.entries(validator.value.fields).filter(
      ([key, value]) => value.type === "requirements"
   );
});


</script>

<style scoped></style>