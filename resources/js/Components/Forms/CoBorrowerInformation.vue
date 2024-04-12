<template>
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
          CO-BORROWER'S PERSONAL INFORMATION (MANDATORY)
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          TO APPLY, SUBMIT COMPLETELY FILLED-OUT LOAD APPLICATION FORM & DOCUMENTARY REQUIREMENTS.
        </p>
      </div>
       
    </div>
  </div>
    <div v-for="(coborrower, index) in coborrowerInformation" :key="index">
        {{ coborrower }}

        <InputText 
            
            class="my-3"
            v-model:model="coborrower.lastname"
            label="Last Name *"
            inputType="text"   
            :hasError="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].lastname.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].lastname : [] "
             
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.firstname"
            label="First Name *"
            inputType="text"   
            :hasError="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].firstname.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].firstname : [] "
             
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.middlename"
            label="middle name*"
            inputType="text"   
            :hasError="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].middlename.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].middlename : [] "
             
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.suffix"
            label="suffix name*"
            inputType="text"   
            :hasError="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].suffix.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].suffix : [] "
             
        />
        <div>
            <label class="block text-sm font-medium mb-2 dark:text-white uppercase">birthdate</label>
                <vue-tailwind-datepicker v-model="coborrower.birth_date" :formatter="{
                        date: 'MMMM DD, YYYY',
                        month: 'MMMM',
                    }" as-single
                     :input-classes="{
                        'focus:border-red-500 focus:ring-red-500 border-red-500': validator.loan.coborrowers.$errors[0]?.$response.$errors[index].birth_date.length > 0? true : false,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.loan.coborrowers.$errors[0]?.$response.$errors[index].birth_date  <= 0 ? true : false,
                        'py-3 px-4 block w-full rounded-lg text-sm relative':true

                        }"
                     
                    placeholder="BIRTH DATE" />
                    <div v-if="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].birth_date.length > 0 ? true : false  ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].birth_date : [] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
                     </div>
        
        </div> 
        <InputText 
            class="my-3"
            v-model:model="coborrower.place_of_birth"
            label="place of birth *"
            inputType="text"   
            :hasError="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].place_of_birth.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].place_of_birth : [] "
             
        />
        <div class="sm:col-span-3">
                <label for="af-account-gender-checkbox"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    GENDER
                </label>
            </div>
        
            <!-- End Col -->
             <div class="sm:col-span-9" :class="{
                        '!focus:border-red-500 focus:ring-red-500 !border-red-500': validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].gender.length > 0,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].gender.length <= 0,
                        'py-3 px-4 block w-full rounded-lg text-sm':true
                        }">
                <div class="sm:flex" >
                   
                    <label for="af-account-gender-checkbox-male"
                        class="flex py-2 px-3 w-full shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                        sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="coborrower.gender" 
                             value="Male" type="radio"
                            name="af-account-gender-checkbox"
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
                        <input v-model="coborrower.gender" 
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
                    <input v-model="coborrower.gender" 
                    value="OTHER" type="radio" name="af-account-gender-checkbox"
                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 
                    disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500
                     dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">OTHER</span>
                </label>
                <input v-model="coborrower.gender" 
                value="" type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none 
                    sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                    disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="IF OTHERS, PLEASE SPECIFY:">
                </div>

            </div>
        
            <div v-if="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].gender.length > 0 ? true : false ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].gender :[] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
            </div>
        
            <div class="sm:col-span-3" >
                <label for="civil_status-checkbox" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    CIVIL STATUS
                </label>
            </div>
            <div class="sm:col-span-9" :class="{
                        '!focus:border-red-500 focus:ring-red-500 !border-red-500': validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].civil_status.length > 0,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].civil_status.length <= 0,
                        'py-3 px-4 block w-full rounded-lg text-sm':true
                        }" >
                <div class="sm:flex">
                    <label for="civil_status-checkbox-single"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                        last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                         sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                         disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="coborrower.civil_status" 
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
                        <input v-model="coborrower.civil_status" 
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
                        <input v-model="coborrower.civil_status" 
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
                        <input v-model="coborrower.civil_status"
                                value="WIDOW/WIDOWER" type="radio" 
                                name="civilstatus-checkbox"
                                class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50
                                disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                              dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">WIDOW / WIDOWER</span>
                    </label>
                </div>
            </div>
            <div v-if="validator.$dirty && validator.$errors[index]?.$response.$errors[index].civil_status.length > 0 ? true : false ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].civil_status : [] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
            </div>
      
        
        <InputText 
            class="my-3"
            v-model:model="coborrower.present_address"
            label="present address*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].present_address.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].present_address : [] "
             
        />
        <div v-if="validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].gender.length > 0 ? true : false ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.loan.coborrowers.$errors[0]?.$response.$errors[index].gender :[] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
            </div>
        
            <div class="sm:col-span-3" >
                <label for="address_ownership-checkbox" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                    ADDRESS OWNERSHIP
                </label>
            </div>
            <div class="sm:col-span-9" :class="{
                        '!focus:border-red-500 focus:ring-red-500 !border-red-500': validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].address_ownership.length > 0,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.$dirty && validator.loan.coborrowers.$errors[0]?.$response.$errors[index].address_ownership.length <= 0,
                        'py-3 px-4 block w-full rounded-lg text-sm':true
                        }" >
                <div class="sm:flex">
                    <label for="address_ownership-checkbox-single"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                        last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                         sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 
                         disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="coborrower.address_ownership" 
                        value="SINGLE" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">SINGLE</span>
                    </label>

                    <label for="address_ownership-checkbox-married"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="coborrower.address_ownership" 
                        value="MARRIED" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">MARRIED</span>
                    </label>
                    <label for="address_ownership-checkbox-married"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="coborrower.address_ownership" 
                        value="SEPERATED" type="radio" name="civilstatus-checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                            disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                             dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">SEPERATED</span>
                    </label>

                    <label for="address_ownership-checkbox-widow"
                        class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                        sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm 
                        relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                         dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <input v-model="coborrower.address_ownership"
                                value="WIDOW/WIDOWER" type="radio" 
                                name="civilstatus-checkbox"
                                class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50
                                disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                              dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            >
                        <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">WIDOW / WIDOWER</span>
                    </label>
                </div>
            </div>
            <div v-if="validator.$dirty && validator.$errors[index]?.$response.$errors[index].address_ownership.length > 0 ? true : false ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].address_ownership : [] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
            </div>
            <InputText 
            class="my-3"
            v-model:model="coborrower.present_address_length"
            label="length of stay at present address (YEARS)*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].present_address_length.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].present_address_length : [] "   
        />
        
        <InputText 
            class="my-3"
            v-model:model="coborrower.permanent_address"
            label="permanent address*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].permanent_address.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].permanent_address : [] "   
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.permanent_address_length"
            label="length of stay at permanent address (YEARS)*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].permanent_address_length.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].permanent_address_length : [] "   
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.provincial_address"
            label="provincial address*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].provincial_address.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].provincial_address : [] "  
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.provincial_address_length"
            label="length of stay at provincial address (YEARS)*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].provincial_address_length.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].provincial_address_length : [] "  
        />
        <InputText 
            class="my-3"
            v-model:model="coborrower.phone_number"
            label="Phone number*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].phone_number.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].phone_number : [] "  
        /> 
        <InputText 
            class="my-3"
            v-model:model="coborrower.email"
            label="email address*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].email.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].email : [] "  
        />        
        <InputText 
            class="my-3"
            v-model:model="coborrower.facebook_account_name"
            label="Facebook Name*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].facebook_account_name.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].facebook_account_name : [] "  
        /> 
        <InputText 
            class="my-3"
            v-model:model="coborrower.nationality"
            label="nationality*"
            inputType="text"   
            :hasError="validator.$dirty && validator.$errors[index]?.$response.$errors[index].nationality.length > 0 ? true : false "
            :errors=" validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].nationality : [] "  
        /> 
       
            <div class="sm:col-span-3">
            <label for="af-account-education-checkbox"
                class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                HIGHEST EDUCATION ATTAINMENT
            </label>
        </div>
        <div class="sm:col-span-9" :class="{
                        '!focus:border-red-500 focus:ring-red-500 !border-red-500': validator.$dirty && validator.$errors[index]?.$response.$errors[index].education.length > 0,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.$dirty && validator.$errors[index]?.$response.$errors[index].education.length <= 0,
                        'py-3 px-4 block w-full rounded-lg text-sm':true
                        }" >
            <div class="sm:flex">
                <label for="af-account-education-checkbox-highschool"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px 
                    first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 
                    sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10
                     focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                      dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="coborrower.education" 
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
                    <input v-model="coborrower.education"     
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
                    <input v-model="coborrower.education" 
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
                    <input v-model="coborrower.education" 
                        value="Undergraduate" type="radio" name="af-account-education-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">Undergraduate</span>
                </label>
            </div>
        </div>
        <div v-if="validator.$dirty && validator.$errors[index]?.$response.$errors[index].education.length > 0 ? true : false ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].education : [] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
            </div>
            <div class="sm:col-span-3">
            <label for="af-account-source_of_funds-checkbox"
                class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                SOURCE OF FUNDS
            </label>
        </div>
        <div class="sm:col-span-9" :class="{
                        '!focus:border-red-500 focus:ring-red-500 !border-red-500': validator.$dirty && validator.$errors[index]?.$response.$errors[index].source_of_funds.length > 0,
                        'dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400':!validator.$dirty && validator.$errors[index]?.$response.$errors[index].source_of_funds.length <= 0,
                        'py-3 px-4 block w-full rounded-lg text-sm':true
                        }" >
            <div class="sm:flex">
                <label for="af-account-source_of_funds-checkbox-salarypro"
                    class="flex py-2 px-3 w-full border border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg 
                    last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none
                     sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
                      disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                    <input v-model="coborrower.source_of_funds" 
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
                    <input v-model="coborrower.source_of_funds" 
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
                    <input v-model="coborrower.source_of_funds" 
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
                    <input v-model="coborrower.source_of_funds" 
                    value="OTHER" type="radio" name="af-account-nationality-checkbox"
                        class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 
                        disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500
                         dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">OTHER</span>
                </label>
                <input v-model="coborrower.source_of_funds" 
                value="" type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg 
                    sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm
                     relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                      dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="IF OTHERS, PLEASE SPECIFY:">
            </div>
        </div>
        <div v-if="validator.$dirty && validator.$errors[index]?.$response.$errors[index].source_of_funds.length > 0 ? true : false ">
                     <p v-for="(error, index) in validator.$errors.length > 0 ? validator.$errors[index]?.$response.$errors[index].source_of_funds : [] " :key="index" 
                     class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                        {{ error.$message }}
                     </p>
            </div>
    </div>
   
</template>

<script setup>
import InputText from "@/Components/Input/InputText.vue";
import VueTailwindDatepicker from "vue-tailwind-datepicker";
const coborrowerInformation = defineModel ('coborrowerInformation',{default:{}})
const validator = defineModel('validator')
console.log('validator from CB', validator)
</script>

<style scoped>

</style>