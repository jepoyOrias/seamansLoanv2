<template>
    <Toast :toast="objToast" />
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
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
                <div class="max-w-full mx-auto max-h-[70vh]  overflow-y-scroll">
                    <div class="shadow-md rounded-lg px-5">



                        <PersonalInformation v-model:personalInformation="loan.personal_information"
                            v-model:objValidator="objValidator"></PersonalInformation>
                    </div>
                   
                </div>
                <div class="flex justify-end items-center  gap-3 px-8 py-4">
                        <button @click="handleCloseClick"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Cancel</button>
                        <button @click="updatePersonalInformation" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>


                    </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal/Index.vue';
import { computed, ref, watch } from "vue";
import PersonalInformation from "@/Components/Forms/PersonalInformation.vue";
import { objFormValidator } from '@/utility/validator';
import Toast from '@/Components/Toast/Index.vue';
import axios from 'axios';

const ModalisOpen = defineModel('personalInformationModal');
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

const props = defineProps({
    personalInformation: {
        type: Object,
        default: {
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
        }
    }
})


const term_months = [
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

];

const addressOwnership = [
    { label: 'Owned', value: 'Owned' },
    { label: 'Owned/Mortgage', value: 'Owned/Mortgage' },
    { label: 'Living w/ Relatives', value: 'Living w/ Relatives' },
    { label: 'Renting', value: 'Renting' }
];


const loan = computed(() => {
    loan.personal_information = { ...props.personalInformation }
    return loan;
})




objValidator.value.fields = {
    lastname: { required: true, inputType: 'text', label: 'Lastname', type: 'personal_information' },
    firstname: { required: true, inputType: 'text', label: 'Firstname', type: 'personal_information' },
    middlename: { required: true, inputType: 'text', label: 'Middlename', type: 'personal_information' },
    suffix: { inputType: 'text', label: 'Suffix', type: 'personal_information' },
    birth_date: { required: true, inputType: 'date', label: 'Birthdate', type: 'personal_information' },
    place_of_birth: { required: true, inputType: 'text', label: 'Place of Birth', type: 'personal_information' },
    gender: { required: true, inputType: 'radio', label: 'Gender', type: 'personal_information', options: ['Male', 'Female', 'Others'] },
    civil_status: { required: true, inputType: 'selectOption', label: 'Civil Status', type: 'personal_information', options: civilStatus },
    present_address: { required: true, inputType: 'text', label: 'Present Address', type: 'personal_information' },
    address_ownership: { required: true, inputType: 'selectOption', label: 'Address Ownership', type: 'personal_information', options: addressOwnership },
    present_address_length: { required: true, numeric: true, inputType: 'text', label: 'Length of Stay (Years)', type: 'personal_information' },
    permanent_address: { required: true, inputType: 'text', label: 'Permanent Address', type: 'personal_information' },
    permanent_address_length: { required: true, numeric: true, inputType: 'text', label: 'Length of Stay (Years)', type: 'personal_information' },
    provincial_address: { required: true, inputType: 'text', label: 'Provincial Address', type: 'personal_information' },
    provincial_address_length: { required: true, numeric: true, inputType: 'text', label: 'Length of Stay (Years)', type: 'personal_information' },
    phone_number: { required: true, numeric: true, inputType: 'text', label: 'Phone Number', type: 'personal_information' },
    email: { required: true, pattern: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g, inputType: 'text', label: 'Email Address', type: 'personal_information' },
    facebook_account_name: { required: true, inputType: 'text', label: 'Facebook account name / Facebook Link', type: 'personal_information' },
    nationality: { required: true, inputType: 'text', label: 'Nationality', type: 'personal_information' },
    TIN_NO: { required: true, inputType: 'text', label: 'Tin number', type: 'personal_information' },
    SSS_NO: { required: true, inputType: 'text', label: 'SSS number', type: 'personal_information' },
    education: { required: true, inputType: 'radio', label: 'Highest Educational Attainment', type: 'personal_information', options: ['High School', 'College Graduate', 'Post Graduate', 'Under Graduate'] },
    source_of_fund: { required: true, inputType: 'radio', label: 'Source of Fund', type: 'personal_information', options: ['Salary/Profession', 'Business', 'Remittance'] },
}

const prevStep = () => {
    currentStep.value--;
};


const handleCloseClick = () => {
    emit('onCloseModal', true);

}


const objToast = ref(null);

const updatePersonalInformation = ()=>{
    axios.put(`/personal-information/${loan.personal_information.id}`, loan.personal_information)
    .then(response=>{
        handleCloseClick();
        objToast.value = {
            title: 'Success',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle shrink-0 text-green-300"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
            message: response.data.message
        }
    }).catch(errors=>{
        objToast.value = {
            title: 'Error',
            icon: '',
            message: errors.data.error
        }
    })
}

</script>

<style lang="scss" scoped></style>