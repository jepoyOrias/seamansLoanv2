<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');
        return [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:personal_information,email,' . $id,
            'civil_status' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'birth_date' => 'required',
            'place_of_birth' => 'required|string|max:255',
            'present_address' => 'required|string|max:255',
            'address_ownership' => 'required|string|max:255',
            'present_address_length' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'permanent_address_length' => 'required|string|max:255',
            'provincial_address' => 'nullable|string|max:255',
            'provincial_address_length' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255|unique:personal_information,phone_number,' . $id,
            'TIN_NO' => 'nullable|string|max:255|unique:personal_information,TIN_NO,' . $id,
            'SSS_NO' => 'required|string|max:255|unique:personal_information,SSS_NO,' . $id,
            'facebook_account_name' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'source_of_fund' => 'required|string|max:255',
        ];
    }
}
