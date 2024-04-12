<template>
    <Modal v-model:isOpen="ModalisOpen">
        <div
            class="modal-body max-h-[80vh] overflow-y-scroll hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all lg:max-w-lg w-full  h-100  m-3 sm:mx-auto lg:min-w-[800px]">
            <div class="bg-white border  border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center py-3 px-4  dark:border-gray-700">
                    <h3 class="font-bold text-xl text-gray-800 dark:text-gray-200">
                        Application Form
                    </h3>
                   
                    <button type="button" @click="handleCloseClick"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"><span
                            class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="max-w-full mx-auto">
                        <div class="shadow-md rounded-lg">
                            <!-- Stepper -->
                            <div class="flex justify-between items-center px-8 py-4 border-b">
                                <div v-for="(step, index) in steps" :key="index" class="text-gray-600">
                                    <span :class="{ 'font-bold': currentStep === index }">{{ index + 1 }}</span>
                                    <span v-if="index < steps.length - 1" class="mx-2">-</span>
                                </div>
                            </div>

                            <!-- Form Content -->
                            <div class="p-8">
                                <div v-if="currentStep === 0">
                                    <LoanInformation v-model:loanInformation="loan.loan_information"
                                        v-model:validator="validator"></LoanInformation>
                                    <PersonalInformation v-model:personalInformation="loan.personal_information"
                                        :rules="rules"
                                        v-model:validator="validator"></PersonalInformation>
                                    <BankAccounts v-model:bankAccounts="loan.releasings" v-model:validator="validator">
                                    </BankAccounts>
                                    
                                    <!-- Other fields for step 1 -->
                                </div>
                                <div v-else-if="currentStep === 1">

                                    <!-- <InputText 
                class="my-3"
                v-model:model="loan.employer_information.name_of_employer"
                label="Employer*"
                :hasError="step2Validator.loan.employer_information.name_of_employer.$error"
                :errors="step2Validator.loan.employer_information.name_of_employer.$errors"
                inputType="text"    
            /> -->
                                    <IncomeInformation v-model:incomeInformation="loan.employer_information"
                                        v-model:validator="step2Validator"></IncomeInformation>
                                    <CoBorrowerInformation v-model:coborrowerInformation="loan.coborrowers"
                                        v-model:validator="step2Validator"></CoBorrowerInformation>
                                    <CharacterReferences v-model:characterReferences="loan.character_references"
                                        v-model:validator="step2Validator"></CharacterReferences>
                                    <!-- Step 2: Form fields -->
                                    <!-- Other fields for step 2 -->
                                </div>
                                <!-- Add more steps as needed -->
                                <div v-else-if="currentStep === 2">
                                    <Requirements v-model:requirements="loan.requirements"
                                        v-model:validator="step3Validator"></Requirements>
                                    TEST 3
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-between items-center px-8 py-4">
                                <button @click="prevStep" :disabled="currentStep === 0"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Previous</button>
                                <button @click="nextStep" :disabled="currentStep === steps.length - 1"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md">Next</button>


                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal/Index.vue';
import { ref,computed ,watchEffect} from "vue";
  import VueTailwindDatepicker from "vue-tailwind-datepicker";
  import PersonalInformation from "@/Components/Forms/PersonalInformation.vue";
  import IncomeInformation from "@/Components/Forms/IncomeInformation.vue";
  import CharacterReferences from "@/Components/Forms/CharacterReferences.vue";
  import CoBorrowerInformation from "@/Components/Forms/CoBorrowerInformation.vue";
  import LoanInformation from "@/Components/Forms/LoanInformation.vue";
  import BankAccounts from "@/Components/Forms/BankAccounts.vue";
  import Requirements from "@/Components/Forms/Requirements.vue";

  import { useVuelidate } from '@vuelidate/core'
  import { required, email, helpers, numeric, maxValue,minValue } from '@vuelidate/validators'
  import InputText from "@/Components/Input/InputText.vue";

const ModalisOpen = defineModel('isApplyNowModal');
const emit = defineEmits(['onCloseModal']);

 
const loan = ref({
    personal_information: {
      lastname: '',
      firstname: '',
      middlename: '',
      suffix: '',
      birth_date: '',
      place_of_birth: '',
      gender: '',
      civil_status: '',
      present_address: '',
      address_ownership: '',
      present_address_length: '',
      permanent_address: '',
      permanent_address_length: '',
      provincial_address: '',
      provincial_address_length: '',
      phone_number: '',
      email: '',
      facebook_account_name: '',
      nationality: '',
      TIN_NO: '',
      SSS_NO: '',
      PAGIBIG_NO: '',
      education: '',
      source_of_funds: '',
      
    },
    loan_information:{
      loan_purpose: '',
      amount: '',
      term_months: '',
    },
    
    employer_information: {
      name_of_employer: '',
      position: '',
      office_address: '',
      
    },
    character_references:[
    { 
      name: '',
      address: '',
      contact_number: '',
    },
    { 
      name: '',
      address: '',
      contact_number: '',
    },
    { 
      name: '',
      address: '',
      contact_number: '',
    },
    
    ],
    coborrowers:[
    {
      lastname: '',
      firstname: '',
      middlename: '',
      suffix: '',
      birth_date: '',
      place_of_birth: '',
      gender: '',
      civil_status: '',
      present_address: '',
      address_ownership: '',
      present_address_length: '',
      permanent_address: '',
      permanent_address_length: '',
      provincial_address: '',
      provincial_address_length: '',
      phone_number: '',
      email: '',
      facebook_account_name: '',
      nationality: '',
      education: '',
      source_of_funds: '',
    },
    ],
    releasings:{
      bank: '',
      branch: '',
      date_opened: '',
      account_type: '',
      account_number: '',
    },
    requirements: {
      contract: null,
      seaman_book: null,
      e_reg: null,
      sirb: null,
      bill: null,
      valid_id_1: null,
      valid_id_2: null,
      marriage_contract:  null,
      send_it_thru: null,
    }
  })
  
  const rules = {loan:{ 
    personal_information: {
      lastname: {
        required: helpers.withMessage('This field is required',required),
        },
      firstname: {required: helpers.withMessage('This field is required',required) },
      middlename: {required: helpers.withMessage('This field is required',required)},
      birth_date: {required: helpers.withMessage('This field is required',required)},
      place_of_birth: {required: helpers.withMessage('This field is required',required)},
      gender: {required: helpers.withMessage('This field is required',required)},
      civil_status: {required: helpers.withMessage('This field is required',required)},
      address_ownership: {required: helpers.withMessage('This field is required',required)},
      present_address_length: {required: helpers.withMessage('This field is required',required),
                          numeric: helpers.withMessage('This field should be numeric',numeric)}, 
      present_address: {required: helpers.withMessage('This field is required',required)},
      permanent_address: {required: helpers.withMessage('This field is required',required)},
      permanent_address_length: {required: helpers.withMessage('This field is required',required),
                            numeric: helpers.withMessage('This field should be numeric',numeric)},
      provincial_address: {required: helpers.withMessage('This field is required',required)},
      provincial_address_length: {required: helpers.withMessage('This field is required',required),
                      numeric: helpers.withMessage('This field should be numeric',numeric)},
      phone_number: {
        required: helpers.withMessage('This field is required',required),
        numeric: helpers.withMessage('This field should be numeric',numeric)
        },
      email: {
        required: helpers.withMessage('This field is required',required), 
        email: helpers.withMessage('Please enter a valid email',email),
        email: helpers.withMessage('example@gmail.com',email)
      },
      facebook_account_name: {required: helpers.withMessage('This field is required',required)},
      nationality: {required: helpers.withMessage('This field is required',required)},
      TIN_NO: {required: helpers.withMessage('This field is required',required)},
      SSS_NO: {required: helpers.withMessage('This field is required',required)},
      PAGIBIG_NO: {required: helpers.withMessage('This field is required',required)},
      education: {required: helpers.withMessage('This field is required',required)},
      source_of_funds: {required: helpers.withMessage('This field is required',required)},
      
    },
      
   
     releasings: {
       bank: {required: helpers.withMessage('This field is required',required)},
       branch: {required: helpers.withMessage('This field is required',required)},
       date_opened: {required: helpers.withMessage('This field is required',required)},
       account_type: {required: helpers.withMessage('This field is required',required)},
       account_number: {required: helpers.withMessage('This field is required',required)},
  },
    loan_information:{
      loan_purpose: {required: helpers.withMessage('This field is required',required)},
      amount:{required: helpers.withMessage('This field is required',required),
                  numeric: helpers.withMessage('This field should be numeric',numeric),
                  minValueValue:minValue(30000),
                  maxValueValue:maxValue(1000000),
                  
                    
    },
    term_months:{required: helpers.withMessage('This field is required',required)},
     },
    
  }  
  }

const step2Rules= computed(()=>{
return {
  loan:{ 
    coborrowers:{
      $each:helpers.forEach({
      lastname: {required: helpers.withMessage('This field is required',required)},
      firstname: {required: helpers.withMessage('This field is required',required)},
      middlename: {required: helpers.withMessage('This field is required',required)},
      suffix: {required: helpers.withMessage('This field is required',required)},
      birth_date: {required: helpers.withMessage('This field is required',required)},
      place_of_birth: {required: helpers.withMessage('This field is required',required)},
      gender: {required: helpers.withMessage('This field is required',required)},
      civil_status: {required: helpers.withMessage('This field is required',required)},
      address_ownership: {required: helpers.withMessage('This field is required',required)},
      present_address_length: {required: helpers.withMessage('This field is required',required),
                          numeric: helpers.withMessage('This field should be numeric',numeric)}, 
      present_address: {required: helpers.withMessage('This field is required',required)},
      permanent_address: {required: helpers.withMessage('This field is required',required)},
      permanent_address_length: {required: helpers.withMessage('This field is required',required),
                            numeric: helpers.withMessage('This field should be numeric',numeric)},
      provincial_address: {required: helpers.withMessage('This field is required',required)},
      provincial_address_length: {required: helpers.withMessage('This field is required',required),
                      numeric: helpers.withMessage('This field should be numeric',numeric)},
      phone_number: {
        required: helpers.withMessage('This field is required',required),
        numeric: helpers.withMessage('This field should be numeric',numeric)
      },
      email: {
        required: helpers.withMessage('This field is required',required), 
           email: helpers.withMessage('Please enter a valid email',email),
           email: helpers.withMessage('example@gmail.com',email)
      }, 
      facebook_account_name: {required: helpers.withMessage('This field is required',required)},
      nationality: {required: helpers.withMessage('This field is required',required)},
      education: {required: helpers.withMessage('This field is required',required)},
      source_of_funds: {required: helpers.withMessage('This field is required',required)},
  })
   },
  character_references:{
    $each:helpers.forEach({ 
      name: {required: helpers.withMessage('This field is required',required)},
      address: {required: helpers.withMessage('This field is required',required)},
      contact_number: {
        required: helpers.withMessage('This field is required',required),
        numeric: helpers.withMessage('This field should be numeric',numeric)
      },
    })
  },
  employer_information: {
      name_of_employer: {required: helpers.withMessage('This field is required',required)},
      position: {required: helpers.withMessage('This field is required',required)},
      office_address: {required: helpers.withMessage('This field is required',required)},
  } 

  }
}
  
})
const step3Rules= {loan:{
    requirements: {
      contract: {required: helpers.withMessage('This field is required',required)},
      // seaman_book: null,
      // e_reg: null,
      // bill: null,
      // valid_id_1: null,
      // valid_id_2: null,
      // marriage_contract:  null,
      // send_it_thru: null,
    }
  }
}

    const validator = useVuelidate(rules, {loan})
    const step2Validator = useVuelidate(step2Rules,{loan})
    const step3Validator = useVuelidate(step3Rules,{loan})
    console.log('validator',validator);
    console.log('Step 2 Validator:', step2Validator);
    console.log('Step 3 Validator:', step3Validator);
  
    const currentStep = ref(0);
   

const steps = [1,2,3];


const nextStep = () => {
  validator.value.$touch()
  if (currentStep.value == 1 ){
    step2Validator.value.$touch()
  }else if(currentStep.value == 2){
    step3Validator.value.$touch()
  }
  if (validator.value.$error || step2Validator.value.$error || step3Validator.value.$error ) {
    
    console.log(validator)
    console.log(step2Validator)
    console.log(step3Validator)
    
    return false;
  }
 
  currentStep.value++;
  
};



const prevStep = () => {
  if (currentStep.value == 1 ){
    step2Validator.value.$reset()
  }
  if (currentStep.value > 0) {
    currentStep.value--;
  }
};


const handleCloseClick = () => {
    emit('onCloseModal', true);

}

</script>

<style lang="scss" scoped></style>