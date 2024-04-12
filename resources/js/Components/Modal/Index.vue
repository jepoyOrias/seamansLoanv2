<template>
    <transition name="modal-fade">
      <div v-if="isOpen" class="modal-backdrop">
        <slot></slot>
      </div>
    </transition>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const isOpen = defineModel('isOpen',{default:false});
  
  const openModal = () => {
    isOpen.value = true;
  };
  
  const closeModal = () => {
    isOpen.value = false;
  };
  
  defineExpose({
    openModal,
    closeModal,
    isOpen,
  });
  </script>
  
  <style scoped>
  .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 100;
  }
  
  .modal {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  }
  
  .modal-fade-enter,
  .modal-fade-leave-to {
    opacity: 0;
  }
  
  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity 0.2s ease;
  }
  
  </style>