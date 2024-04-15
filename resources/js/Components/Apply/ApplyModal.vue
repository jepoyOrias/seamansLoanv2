<template>
  <Toast :toast="objToast"/> 
   <Modal v-model:isOpen="ModalisOpen">
    <div
      class="modal-body max-h-[80vh] hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0  ease-out transition-all lg:max-w-lg w-full  h-100  m-3 sm:mx-auto lg:min-w-[800px]">
      <div class="bg-white border  border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center py-3 px-4  dark:border-gray-700">
          <h3 class="font-bold text-xl text-gray-800 dark:text-gray-200">
            Application Form
          </h3>

          <button type="button" @click="handleCloseClick"
            class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"><span
              class="sr-only">Close</span>
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <div class="max-w-full mx-auto max-h-[80vh]  overflow-y-scroll">
          <div class="shadow-md rounded-lg">
            <!-- Stepper -->

            <ol class="lg:flex items-center w-full space-y-4 lg:space-y-0  px-5 mt-10">
              <li class="  flex-1 " v-for="(step, index) in steps" :key="index">
                <div class="flex items-center font-medium px-4 py-5 w-full"
                  :class="{ 'flex items-center font-medium px-4 py-5 w-full rounded-lg bg-blue-50 dark:bg-slate-900': currentStep === index }">
                  <span :class="{
                          'w-8 h-8  border border-gray-200 dark:text-slate-50 rounded-full flex justify-center items-center mr-3 text-sm  lg:w-10 lg:h-10': true,
                          'w-8 h-8 dark:bg-transparent dark:border !dark:border-yellow-500 !bg-blue-900 rounded-full flex justify-center items-center mr-3 text-sm text-white dark:text-slate-100 lg:w-10 lg:h-10': currentStep === index,
                          'w-8 h-8 border border-blue-900 dark:border-yellow-500 !dark:border-slate-100 rounded-full flex justify-center items-center mr-3 text-sm dark:text-yellow-500 lg:w-10 lg:h-10': currentStep > index
                        }">{{ index + 1 }}</span>
                  <h4 class="text-blue-900   dark:text-yellow-500">
                    {{ index == 0 ? "Borrower's Informations" : index == 1 ? "Co-Borrower's Information" : ' Submit Requirements'}}
                  </h4>
                </div>
              </li>

            </ol>




            <!-- Form Content -->
            <div class="p-8">
              <div v-if="currentStep === 0">
                <LoanInformation v-model:loanInformation="loan.loan_information" v-model:objValidator="objValidator">
                </LoanInformation>

                <PersonalInformation v-model:personalInformation="loan.personal_information"
                  v-model:objValidator="objValidator"></PersonalInformation>

                <BankAccounts v-model:bankAccounts="loan.releasings" v-model:objValidator="objValidator">
                </BankAccounts>

                <IncomeInformation v-model:incomeInformation="loan.employer_information"
                  v-model:objValidator="objValidator">
                </IncomeInformation>
                <!-- Other fields for step 1 -->
              </div>
              <div v-else-if="currentStep === 1">
                <CoBorrowerInformation v-model:coborrowersInformation="loan.coborrowers"
                  v-model:objValidator="objValidator">
                </CoBorrowerInformation>
                <CharacterReferences v-model:contactReferences="loan.contact_references"
                  v-model:validator="step2Validator"></CharacterReferences>
              </div>
              <!-- Add more steps as needed -->
              <div v-else-if="currentStep === 2">
                <Requirements v-model:requirements="loan.requirements"  v-model:objValidator="objValidator">
                </Requirements>
              </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center px-8 py-4">
              <button @click="prevStep" :disabled="currentStep === 0"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Previous</button>
              <button @click="nextStep"
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
import { ref, computed, watchEffect, watch } from "vue";
import VueTailwindDatepicker from "vue-tailwind-datepicker";
import PersonalInformation from "@/Components/Forms/PersonalInformation.vue";
import IncomeInformation from "@/Components/Forms/IncomeInformation.vue";
import CharacterReferences from "@/Components/Forms/CharacterReferences.vue";
import CoBorrowerInformation from "@/Components/Forms/CoBorrowerInformation.vue";
import LoanInformation from "@/Components/Forms/LoanInformation.vue";
import BankAccounts from "@/Components/Forms/BankAccounts.vue";
import Requirements from "@/Components/Forms/Requirements.vue";
import { objFormValidator } from '@/utility/validator';
import Toast from '@/Components/Toast/Index.vue';

import { useVuelidate } from '@vuelidate/core'
import { required, email, helpers, numeric, maxValue, minValue } from '@vuelidate/validators'
import axios from 'axios';

const ModalisOpen = defineModel('isApplyNowModal');
const emit = defineEmits(['onCloseModal']);

const objValidator = ref({ ...objFormValidator });

objValidator.value.default = {
  required: (_, obj) => `${obj.label} is required`,
  numeric: (_, obj) => `${obj.label} was not in correct format`,
  minnumber: (field, obj) => `${obj.label} was below the minimum number ${obj.minnumber}`,
  maxnumber: (field, obj) => `${obj.label} was exceeded the maximum number ${obj.maxnumber}`,
  maxlength: (field, obj) => `${obj.label} was exceeded the maxlength ${obj.maxlength}`,
  pattern: (field, obj) => `${obj.label} was not a valid email pattern`
}




const term_months = [
  { label: '1 month', value: 1 },
  { label: '2 months', value: 2 },
  { label: '3 months', value: 3 },
  { label: '4 months', value: 4 },
  { label: '5 months', value: 5 },
  { label: '6 months', value: 6 },
  { label: '7 months', value: 7 },
  { label: '8 months', value: 8 },
  { label: '9 months', value: 9 },
  { label: '10 months', value: 10 },
  { label: '11 months', value: 11 },
  { label: '12 months', value: 12 }
];

const loan_purposes = [
  {
    label: 'PERSONAL/FAMILY EXPENSES',
    value: 'Personal/Family Expenses',
  },
  {
    label: 'HOME PURCHASE/DEVELOPMENT',
    value: 'Home Purchase/Development',
  },
  {
    label: 'HOUSE RENOVATION',
    value: 'House Renovation',
  },

  {
    label: 'LAND PURCHASE/DEVELOPMENT',
    value: 'Land Purchase/Development',
  },
  {
    label: 'VEHICLE PURCHASE',
    value: 'Vehile Purchase',
  },
  {
    label: 'WORKING CAPITAL/BUSINESS CAPITAL',
    value: 'Working Capital/Business Capital',
  },
  {
    label: 'EDUCATIONAL ASSISTANCE',
    value: 'Educational Assistance',
  },
  {
    label: 'MEDICAL ASSISTANCE',
    value: 'Medical Assistance',
  },
  {
    label: 'APPLIANCES / ASSET PURCHASE',
    value: 'Appliaces/Asset Purchase',
  },
  {
    label: 'OTHERS',
    value: 'Others',
  },
]

const civilStatus = [
  { label: 'Single', value: 'Single' },
  { label: 'Married', value: 'Married' },
  { label: 'Separated', value: 'Separated' },
  { label: 'Widow / Widower', value: 'Widow / Widower' }
];

const addressOwnership = [
  { label: 'Owned', value: 'Owned' },
  { label: 'Owned/Mortgage', value: 'Owned/Mortgage' },
  { label: 'Living w/ Relatives', value: 'Living w/ Relatives' },
  { label: 'Renting', value: 'Renting' }
];
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
    nationality: 'Filipino',
    TIN_NO: '',
    SSS_NO: '',
    education: '',
    source_of_fund: '',

  },
  loan_information: {
    loan_purpose: '',
    amount: '',
    term_months: '',
    interest_rate: '2.5',
  },

  employer_information: {
    name_of_employer: '',
    position: '',
    office_address: '',

  },
  contact_references: [
    {
      name: '',
      address: '',
      mobile_number: '',
    },
    {
      name: '',
      address: '',
      mobile_number: '',
    },
    {
      name: '',
      address: '',
      mobile_number: '',
    },

  ],
  coborrowers: [
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
    nationality: 'Filipino',
    TIN_NO: '',
    SSS_NO: '',
    education: '',
    source_of_fund: '',
    },
  ],
  releasings: {
    bank: '',
    branch: '',
    date_opened: '',
    account_type: '',
    account_number: '',
  },
  requirements: {
    contract: null,
    seamans_book: null,
    passport: null,
    e_reg: null,
    sirb: null,
    bill: null,
    valid_id_1: null,
    valid_id_2: null,
    marriage_contract: null,
    send_it_thru: null,
    signature: null,
    oec: null
  }
})

watch(()=>loan.value.personal_information.civil_status, (newValue)=>{
    if(newValue === 'Single'){
      objValidator.value.fields.marriage_contract.label = 'Birth Certificate'
    } 
});

objValidator.value.fields = {
  loan_purpose: { required: true, inputType: 'selectOption', label: 'Loan Purpose', type: 'loan_information', options: loan_purposes },
  amount: {required: true, numeric:true,minnumber: 30000, maxnumber:1000000, inputType: 'text', label: 'Amount', type:'loan_information'},
  term_months: {required: true, inputType: 'selectOption', label:'Term Months', type:'loan_information', options: term_months},

  lastname: { required: true, inputType: 'text', label: 'Lastname', type: 'personal_information' },
  firstname: {required: true, inputType: 'text', label: 'Firstname', type:'personal_information'},
  middlename: {required: true, inputType: 'text', label: 'Middlename',type:'personal_information'},
  suffix: {inputType: 'text', label: 'Suffix', type:'personal_information'},
  birth_date: {required: true, inputType: 'date', label: 'Birthdate', type:'personal_information'},
  place_of_birth: {required: true, inputType: 'text', label: 'Place of Birth', type:'personal_information'},
  gender: {required: true, inputType: 'radio', label: 'Gender', type:'personal_information', options: ['Male', 'Female', 'Others']},
  civil_status: {required: true, inputType: 'selectOption', label: 'Civil Status', type:'personal_information', options: civilStatus},
  present_address: {required: true, inputType: 'text', label: 'Present Address', type:'personal_information'},
  address_ownership: {required: true, inputType: 'selectOption', label: 'Address Ownership', type:'personal_information',options: addressOwnership},
  present_address_length: {required: true,  numeric:true,inputType: 'text', label: 'Stay of length at Present Address (Years)', type:'personal_information'},
  permanent_address: {required: true, inputType: 'text', label: 'Permanent Address', type:'personal_information'},
  permanent_address_length: {required: true, numeric:true,inputType: 'text', label: 'Stay of length at Permanent Address (Years)', type:'personal_information'},
  provincial_address: {required: true, inputType: 'text', label: 'Provincial Address', type:'personal_information'},
  provincial_address_length: {required: true,numeric:true, inputType: 'text', label: 'Stay of length at Provincial Address (Years)', type:'personal_information'},
  phone_number: {required: true, numeric:true, inputType: 'text', label: 'Phone Number', type:'personal_information'},
  email: {required: true, pattern: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g , inputType: 'text', label: 'Email Address', type:'personal_information'},
  facebook_account_name: {required: true, inputType: 'text', label: 'Facebook account name / Facebook Link', type:'personal_information'},
  nationality: {required: true, inputType: 'text', label: 'Nationality', type:'personal_information'},
  TIN_NO: {required: true, inputType: 'text', label: 'Tin number', type:'personal_information'},
  SSS_NO: {required: true, inputType: 'text', label: 'SSS number', type:'personal_information'},
  education: {required: true, inputType: 'radio', label: 'Highest Educational Attainment', type:'personal_information' , options: ['High School', 'College Graduate', 'Post Graduate' , 'Under Graduate']},
  source_of_fund: {required: true, inputType: 'radio', label: 'Source of Fund', type:'personal_information',options: ['Salary/Profession', 'Business', 'Remittance']},

  bank: { required: true, inputType: 'text', label: 'Bank', type: 'releasings' },
  branch: {required: true, inputType: 'text', label: 'Branch', type:'releasings'},
  date_opened: {required: true, inputType: 'date', label: 'Date Opened', type:'releasings'},
  account_type: {required: true, inputType: 'text', label:'Account Type', type:'releasings'},
  account_number: {required: true, numeric:true, inputType: 'text', label: 'Account Number', type:'releasings'},


  name_of_employer: { required: true, inputType: 'text', label: 'Name of Employer / Business', type: 'employer_information' },
  position: { required: true, inputType: 'text', label: 'Position', type: 'employer_information' },
  office_address: { required: true, inputType: 'text', label: 'Address', type: 'employer_information' },
  

  contract: { required: true, inputType: 'file', label: 'Contract', type: 'requirements' },
  seamans_book: { required: true, inputType: 'file', label: "Seaman's Book", type: 'requirements' },
  passport: { required: true, inputType: 'file', label: "Passport", type: 'requirements' },
  e_reg: { required: true, inputType: 'file', label: 'E-Registration', type: 'requirements' },
  sirb: { required: true, inputType: 'file', label: 'SIRB LAST STAMP', type: 'requirements' },
  bill: { required: true, inputType: 'file', label: 'bill', type: 'requirements' },
  valid_id_1: { required: true, inputType: 'file', label: 'Government Valid ID 1', type: 'requirements' },
  valid_id_2: { required: true, inputType: 'file', label: 'Government Valid ID 2', type: 'requirements' },
  marriage_contract: { required: true, inputType: 'file', label: 'Marriage Contract', type: 'requirements' },
  oec: { required: true, inputType: 'file', label: 'OEC', type: 'requirements' },
  signature: { required: true, inputType: 'file', label: 'Signature', type: 'requirements' },
}




const currentStep = ref(0);
const steps = [1, 2, 3];

const objToast = ref(null);

const rulesForCharacterReferences = computed(() => {
  return {
    loan: {
      contact_references: {
        $each: helpers.forEach({
          name: { required: helpers.withMessage('This field is required', required) },
          address: { required: helpers.withMessage('This field is required', required) },
          mobile_number: {
            required: helpers.withMessage('This field is required', required),
            numeric: helpers.withMessage('This field should be numeric', numeric)
          },
        })
      },
    }
  }
});

const step2Validator = useVuelidate(rulesForCharacterReferences, { loan });

const nextStep = () => {
  let hasError = false;
  if (currentStep.value == 0 && objValidator.value.validateFields({ ...loan.value.loan_information, ...loan.value.personal_information, ...loan.value.releasings,...loan.value.employer_information })) {
    console.log(objValidator.value.getFieldsKeyWithError());
    hasError = true;
    return false;
  }
  else if (currentStep.value == 1) {
    step2Validator.value.$touch();

    if (objValidator.value.validateFields({ ...loan.value.coborrowers[0] }) || step2Validator.value.$error) {
      hasError = true;
      return false;
    }
  }
  else if(currentStep.value == 2 && objValidator.value.validateFields({ ...loan.value.requirements})){
    console.log(objValidator.value.getFieldsKeyWithError());
    hasError = true;
    return false;
  }

  if(currentStep.value == 2  &&  !hasError){
    console.log(loan.value)
   axios.post('loans', loan.value,{
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(response => {
      handleCloseClick();
      objToast.value = {
        title: 'Success',
        icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        message: 'We sent you a reference number. Please check your email.'
      }
   }).catch(error => {
            objToast.value = {
                title: 'Error',
                icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
                message: error.response.data.message,
                cancelButton: 'Close',
                showCancelButton:false,
                onClickConfirm: (e) => { objToast.value = null },
                confirmButton: 'Ok'
            }
   })
  }else{
    currentStep.value++;
  }
  


};




const prevStep = () => {
  currentStep.value--;
};


const handleCloseClick = () => {
  objValidator.value.clearErrors();
  step2Validator.value.$reset();
  currentStep.value = 0;
  emit('onCloseModal', true);
  


}

</script>

<style lang="scss" scoped></style>