<template>
    <div>
        <InputText 
            class="my-3"
            v-model:model="personalInformation.lastname"
            label="Last Name *"
            :hasError="validator.loan.personal_information.lastname.$error"
            :errors="validator.loan.personal_information.lastname.$errors"
            inputType="text"    
        />
        <InputText
            class="my-3"
            v-model:model="personalInformation.firstname"
            label="First Name *"
            :hasError="validator.loan.personal_information.firstname.$error"
            :errors="validator.loan.personal_information.firstname.$errors"
            inputType="text"    
        />
        <InputText
            class="my-3"
            v-model:model="personalInformation.middlename"
            label="Middle name *"
            :hasError="validator.loan.personal_information.middlename.$error"
            :errors="validator.loan.personal_information.middlename.$errors"
            inputType="text"    
        />
        <InputText
            class="my-3"
            v-model:model="personalInformation.suffix"
            label="Suffix (Optional)"
            inputType="text"    
        /> 
        <div class="w-full relative">
            <label class="block text-sm font-medium mb-2 dark:text-white uppercase">birthdate</label>
                <vue-tailwind-datepicker v-model="personalInformation.birth_date" :formatter="{
                        date: 'MMMM DD, YYYY',
                        month: 'MMMM',
                    }" as-single
                    :input-classes="{
                        'focus:border-red-500 focus:ring-red-500 border-red-500': validator.loan.personal_information.birth_date.$error,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.loan.personal_information.birth_date.$error,
                        'py-3 px-4 block w-full rounded-lg text-sm relative':true

                        }"
                     
                    placeholder="BIRTH DATE" />
                    <div v-if="validator.loan.personal_information.birth_date.$error">
                     <p v-for="(error, index) in validator.loan.personal_information.birth_date.$errors" :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
                     </div>
                       <InputText 
                        class="my-3"
                        v-model:model="personalInformation.place_of_birth"
                        label="PLACE OF BIRTH *"
                        :hasError="validator.loan.personal_information.place_of_birth.$error"
                        :errors="validator.loan.personal_information.place_of_birth.$errors"
                        inputType="text"    
                        />
                    </div> 
                        <div class="sm:col-span-3">
                <label for="af-account-gender-checkbox"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    GENDER
                </label>
            </div>
        
            <!-- End Col -->
             <div class="sm:col-span-9">
                <div class="sm:flex" >
                   
                    <label for="af-account-gender-checkbox-male"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                        sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.gender" 
                             value="Male" type="radio"
                            name="af-account-gender-checkbox"
                            :hasError="validator.loan.personal_information.gender.$error"
                             :errors="validator.loan.personal_information.gender.$errors"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                            disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                             dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"/>
                             
                             
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Male</span>
                    </label>

                    <label for="af-account-gender-checkbox-female"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px 
                        first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none 
                        sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500
                         focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700
                          dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.gender" 
                        :hasError="validator.loan.personal_information.gender.$error"
                         :errors="validator.loan.personal_information.gender.$errors"
                        value="Female" type="radio" name="af-account-gender-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                        disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                         dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Female</span>
                    </label>

                    <label for="af-account-gender-checkbox-other"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                    sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                    disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.gender" 
                    :hasError="validator.loan.personal_information.gender.$error"
                    :errors="validator.loan.personal_information.gender.$errors"
                    value="OTHER" type="radio" name="af-account-gender-checkbox"
                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                    disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                     dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">OTHER</span>
                </label>
                <input v-model="personalInformation.gender" 
                         :hasError="validator.loan.personal_information.gender.$error"
                         :errors="validator.loan.personal_information.gender.$errors"
                value="" type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                    sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                    disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="IF OTHERS, PLEASE SPECIFY:">
                </div>
                    <div >
                        <p v-for="(error, index) in validator.loan.personal_information.gender.$errors" :key="index" 
                        class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                        </p>
                    </div>
            </div> 
            </div>
            <div class="sm:col-span-3">
                <label for="civil_status-checkbox" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    CIVIL STATUS
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="sm:flex">
                    <label for="civil_status-checkbox-single"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                        last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                         sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                         disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.civil_status" 
                        :hasError="validator.loan.personal_information.civil_status.$error"
                         :errors="validator.loan.personal_information.civil_status.$errors"
                        value="SINGLE" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">SINGLE</span>
                    </label>

                    <label for="civil_status-checkbox-married"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.civil_status" 
                        :hasError="validator.loan.personal_information.civil_status.$error"
                         :errors="validator.loan.personal_information.civil_status.$errors"
                        value="MARRIED" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">MARRIED</span>
                    </label>
                    <label for="civil_status-checkbox-married"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.civil_status" 
                        :hasError="validator.loan.personal_information.civil_status.$error"
                         :errors="validator.loan.personal_information.civil_status.$errors"
                        value="SEPERATED" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">SEPERATED</span>
                    </label>

                    <label for="civil_status-checkbox-widow"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.civil_status"
                        :hasError="validator.loan.personal_information.civil_status.$error"
                         :errors="validator.loan.personal_information.civil_status.$errors"
                                value="WIDOW/WIDOWER" type="radio" 
                                name="civilstatus-checkbox"
                                class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50
                                disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                              dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">WIDOW / WIDOWER</span>
                    </label>
                </div>
                <div >
                        <p v-for="(error, index) in validator.loan.personal_information.civil_status.$errors" :key="index" 
                        class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                        </p>
                    </div>
            </div>
                   
                         <InputText 
                        class="my-3"
                        v-model:model="personalInformation.present_address"
                        label="present address *"
                        :hasError="validator.loan.personal_information.present_address.$error"
                        :errors="validator.loan.personal_information.present_address.$errors"
                        inputType="text"    
                         />
                         <div class="sm:col-span-3">
                <label for="present_address_status-checkbox" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    ADDRESS OWNERSHIP
                </label>
            </div>
            <div class="sm:col-span-9">
                <div class="sm:flex">
                    <label for="address_ownership-checkbox-single"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                        last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                         sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                         disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.address_ownership" 
                        :hasError="validator.loan.personal_information.address_ownership.$error"
                        :errors="validator.loan.personal_information.address_ownership.$errors"
                        value="OWNED" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">OWNED</span>
                    </label>

                    <label for="address_ownership-checkbox-married"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.address_ownership" 
                        :hasError="validator.loan.personal_information.address_ownership.$error"
                        :errors="validator.loan.personal_information.address_ownership.$errors"
                        value="OWNED/MORTGAGE" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">OWNED/MORTGAGE</span>
                    </label>
                    <label for="address_ownership-checkbox-married"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.address_ownership" 
                        :hasError="validator.loan.personal_information.address_ownership.$error"
                        :errors="validator.loan.personal_information.address_ownership.$errors"
                        value="LIVING W/ RELATIVES" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">LIVING W/ RELATIVES</span>
                    </label>

                    <label for="address_ownership-checkbox-widow"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="personalInformation.address_ownership"
                        :hasError="validator.loan.personal_information.address_ownership.$error"
                        :errors="validator.loan.personal_information.address_ownership.$errors"
                                value="RENTING" type="radio" 
                                name="civilstatus-checkbox"
                                class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50
                                disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                              dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">RENTING</span>
                    </label>
                </div>
                <div >
                        <p v-for="(error, index) in validator.loan.personal_information.address_ownership.$errors" :key="index" 
                        class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                        </p>
                    </div>
                    <InputText 
                        class="my-3"
                        v-model:model="personalInformation.present_address_length"
                        label="LENGTH OF STAY AT PRESENT ADDRESS (YEARS)*"
                        :hasError="validator.loan.personal_information.present_address_length.$error"
                        :errors="validator.loan.personal_information.present_address_length.$errors"
                        inputType="text"    
                         />
                    <InputText 
                        class="my-3"
                        v-model:model="personalInformation.permanent_address"
                        label="permanent address *"
                        :hasError="validator.loan.personal_information.permanent_address.$error"
                        :errors="validator.loan.personal_information.permanent_address.$errors"
                        inputType="text"    
                         />
                         
                    <InputText 
                        class="my-3"
                        v-model:model="personalInformation.permanent_address_length"
                        label="length of stay at permanent address (YEARS)*"
                        :hasError="validator.loan.personal_information.permanent_address_length.$error"
                        :errors="validator.loan.personal_information.permanent_address_length.$errors"
                        inputType="text"    
                         />
                    
                         <InputText 
                        class="my-3"
                        v-model:model="personalInformation.provincial_address"
                        label="provincial address Name *"
                        :hasError="validator.loan.personal_information.provincial_address.$error"
                        :errors="validator.loan.personal_information.provincial_address.$errors"
                        inputType="text"    
                         />
                         <InputText 
                        class="my-3"
                        v-model:model="personalInformation.provincial_address_length"
                        label="length of stay at provincial address (YEARS)*"
                        :hasError="validator.loan.personal_information.provincial_address_length.$error"
                        :errors="validator.loan.personal_information.provincial_address_length.$errors"
                        inputType="text"    
                         />
                        <InputText 
                        class="my-3"
                        v-model:model="personalInformation.phone_number"
                        label="phone number*"
                        :hasError="validator.loan.personal_information.phone_number.$error"
                        :errors="validator.loan.personal_information.phone_number.$errors"
                        inputType="text" 
                        />
                        <InputText 
                        class="my-3"
                        v-model:model="personalInformation.email"
                        label="Email address*"
                        :hasError="validator.loan.personal_information.email.$error"
                        :errors="validator.loan.personal_information.email.$errors"
                        inputType="text" 
                        />
                        
                        <InputText 
                        class="my-3"
                        v-model:model="personalInformation.facebook_account_name"
                        label="facebook account name*"
                        :hasError="validator.loan.personal_information.facebook_account_name.$error"
                        :errors="validator.loan.personal_information.facebook_account_name.$errors"
                        inputType="text" 
                        />
                        <InputText 
                        class="my-3"
                        v-model:model="personalInformation.nationality"
                        label="nationality*"
                        :hasError="validator.loan.personal_information.nationality.$error"
                        :errors="validator.loan.personal_information.nationality.$errors"
                        inputType="text" 
                        />
                        
            <InputText 
                    
                
                        class="my-3"
                        v-model:model="personalInformation.TIN_NO"
                        label="TIN NO *"
                        :hasError="validator.loan.personal_information.TIN_NO.$error"
                        :errors="validator.loan.personal_information.TIN_NO.$errors"
                        inputType="text" 
                        />
                        <InputText 
                        class="my-3"
                        v-model:model="personalInformation.SSS_NO"
                        label="SSS NO *"
                        :hasError="validator.loan.personal_information.SSS_NO.$error"
                        :errors="validator.loan.personal_information.SSS_NO.$errors"
                        inputType="text" 
                        />
                        <InputText 
                        class="my-3"
                        v-model:model="personalInformation.PAGIBIG_NO"
                        label="pag ibig *"
                        :hasError="validator.loan.personal_information.PAGIBIG_NO.$error"
                        :errors="validator.loan.personal_information.PAGIBIG_NO.$errors"
                        inputType="text" 
                        />
        <div class="sm:col-span-3">
            <label for="af-account-education-checkbox"
                class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                HIGHEST EDUCATION ATTAINMENT
            </label>
        </div>
        <div class="sm:col-span-9">
            <div class="sm:flex">
                <label for="af-account-education-checkbox-highschool"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px 
                    first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 
                    sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10
                     focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                      dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.education" 
                        :hasError="validator.loan.personal_information.education.$error"
                        :errors="validator.loan.personal_information.education.$errors"
                        value="High School" type="radio" name="af-account-education-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                        disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                         dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        >
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">High School</span>
                </label>

                <label for="af-account-education-checkbox-female"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                    sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
                     disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.education" 
                        :hasError="validator.loan.personal_information.education.$error"
                        :errors="validator.loan.personal_information.education.$errors"     
                        value="College Graduate" type="radio" name="af-account-education-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                        disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                         dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        >
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">College</span>
                </label>

                <label for="af-account-education-checkbox-other"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                    sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                    disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.education" 
                        :hasError="validator.loan.personal_information.education.$error"
                        :errors="validator.loan.personal_information.education.$errors"
                        value="Post Graduate" type="radio" name="af-account-education-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        >
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Post-Graduate</span>
                </label>

                <label for="af-account-education-checkbox-undergraduate"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                    sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                    relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                     dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.education" 
                        :hasError="validator.loan.personal_information.education.$error"
                        :errors="validator.loan.personal_information.education.$errors"
                        value="Undergraduate" type="radio" name="af-account-education-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Undergraduate</span>
                </label>
            </div>
        </div>
        <div >
                 <p v-for="(error, index) in validator.loan.personal_information.education.$errors" :key="index" 
                class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper" >
                
                {{ error.$message }}
                </p>
            </div>
        
            <div class="sm:col-span-3">
            <label for="af-account-source_of_funds-checkbox"
                class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                SOURCE OF FUNDS
            </label>
        </div>
        <div class="sm:col-span-9">
            <div class="sm:flex">
                <label for="af-account-source_of_funds-checkbox-salarypro"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                     sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
                      disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.source_of_funds" 
                        :hasError="validator.loan.personal_information.source_of_funds.$error"
                        :errors="validator.loan.personal_information.source_of_funds.$errors"
                    value="Salary/Profession" type="radio" name="af-account-sourceoffund-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                        disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                         dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        >
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Salary/Profession</span>
                </label>

                <label for="af-account-source_of_funds-checkbox-businss"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                     sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                     disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.source_of_funds" 
                      :hasError="validator.loan.personal_information.source_of_funds.$error"
                        :errors="validator.loan.personal_information.source_of_funds.$errors"
                        value="Business" type="radio" name="af-account-sourceoffund-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Business</span>
                </label>

                <label for="af-account-source_of_funds-checkbox-remittance"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                    sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg 
                    text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                     dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.source_of_funds" 
                      :hasError="validator.loan.personal_information.source_of_funds.$error"
                        :errors="validator.loan.personal_information.source_of_funds.$errors"
                    value="Remittance" type="radio" name="af-account-sourceoffund-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        >
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Remittance</span>
                </label>
                <label for="af-account-source_of_funds-checkbox-other"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                    sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                    disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="personalInformation.source_of_funds" 
                      :hasError="validator.loan.personal_information.source_of_funds.$error"
                        :errors="validator.loan.personal_information.source_of_funds.$errors"
                    value="OTHER" type="radio" name="af-account-nationality-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">OTHER</span>
                </label>
                <input v-model="personalInformation.source_of_funds" 
                :hasError="validator.loan.personal_information.source_of_funds.$error"
                        :errors="validator.loan.personal_information.source_of_funds.$errors"
                value="" type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                    sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm
                     relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                      dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="IF OTHERS, PLEASE SPECIFY:">
            </div>
        </div>
        <div >
                 <p v-for="(error, index) in validator.loan.personal_information.source_of_funds.$errors" :key="index" 
                class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper" >
                
                {{ error.$message }}
                </p>
            </div>
    </div>
</template>

<script setup>
    import InputText from "@/Components/Input/InputText.vue";
    import VueTailwindDatepicker from "vue-tailwind-datepicker";
    const personalInformation = defineModel('personalInformation',{default:{}})
    const validator = defineModel('validator')
</script>

<style scoped></style>