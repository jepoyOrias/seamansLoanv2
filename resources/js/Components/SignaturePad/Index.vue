<template>
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
        <VueSignaturePad ref="signaturePad" id="signaturePad" class="max-w-[80rem] w-[100
        %] shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-100"/>
        <button @click="undo">Undo</button>
        <button @click="saveSignature">Save Signature</button>
    </div>
</template>

<script setup>
import { ref, watchEffect } from 'vue';
const signaturePad = ref(null);
const signature = ref(null);

const saveSignature = () => {
      const { isEmpty, data } = signaturePad.value.saveSignature();
      if (!isEmpty) {
        // Convert the signature data to base64 format
       signature.value = btoa(String.fromCharCode(...new Uint8Array(data)));
        // Send the base64 data to the Laravel controller
        // axios.post('/save-signature', {
        //   signature: base64Data
        // });
      }
    };

    const undo = () => {
      signaturePad.value.undoSignature();
    };

    watchEffect(()=>{
        console.log(signature);
    });

</script>

<style lang="scss" scoped>

</style>