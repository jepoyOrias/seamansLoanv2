<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class LoanInformationUpdateRequest extends FormRequest
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
        return [
            'loan_purpose' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'term_months' => 'required|numeric',
            'personal_information.name' => 'required|string|max:255',
            'personal_information.email' => 'required|string|max:255|unique:personal_information,email',
            'personal_information.civil_status' => 'required|string|max:255',
            'personal_information.birth_date' => 'required|date',
            'personal_information.place_of_birth' => 'required|string|max:255',
            'personal_information.present_street' => 'required|string|max:255',
            'personal_information.present_brgy' => 'required|string|max:255',
            'personal_information.present_city' => 'required|string|max:255',
            'personal_information.present_province' => 'required|string|max:255',
            'personal_information.address_ownership' => 'required|string|max:255',
            'personal_information.permanent_street' => 'required|string|max:255',
            'personal_information.permanent_brgy' => 'required|string|max:255',
            'personal_information.permanent_city' => 'required|string|max:255',
            'personal_information.permanent_province' => 'required|string|max:255',
            'personal_information.provincial_address' => 'nullable|string|max:255',
            'personal_information.nationality' => 'required|string|max:255',
            'personal_information.phone_number' => 'required|string|max:255|unique:personal_information,phone_number',
            'personal_information.facebook_account_name' => 'nullable|string|max:255',
            'personal_information.education' => 'required|string|max:255',
            'personal_information.source_of_fund' => 'required|string|max:255',
            'contact_references.*.name' => 'required|string|max:255',
            'contact_references.*.mobile_number' => 'required|string|max:255',
            'coborrowers.*.name' => 'required|string|max:255',
            'coborrowers.*.email' => 'required|string|max:255|unique:coborrowers,email',
            'coborrowers.*.civil_status' => 'required|string|max:255',
            'coborrowers.*.birth_date' => 'required|date',
            'coborrowers.*.place_of_birth' => 'required|string|max:255',
            'coborrowers.*.present_street' => 'required|string|max:255',
            'coborrowers.*.present_brgy' => 'required|string|max:255',
            'coborrowers.*.present_city' => 'required|string|max:255',
            'coborrowers.*.present_province' => 'required|string|max:255',
            'coborrowers.*.address_ownership' => 'required|string|max:255',
            'coborrowers.*.permanent_street' => 'required|string|max:255',
            'coborrowers.*.permanent_brgy' => 'required|string|max:255',
            'coborrowers.*.permanent_city' => 'required|string|max:255',
            'coborrowers.*.permanent_province' => 'required|string|max:255',
            'coborrowers.*.provincial_address' => 'nullable|string|max:255',
            'coborrowers.*.nationality' => 'required|string|max:255',
            'coborrowers.*.phone_number' => 'required|string|max:255|unique:coborrowers,phone_number',
            'coborrowers.*.facebook_account_name' => 'nullable|string|max:255',
            'coborrowers.*.education' => 'required|string|max:255',
            'coborrowers.*.source_of_fund' => 'required|string|max:255',
            'personal_information.employer_information.name_of_employer' => 'required|string|max:255',
            'personal_information.employer_information.position' => 'required|string|max:255',
            'personal_information.employer_information.office_address' => 'required|string|max:255',
            'releasing.bank' => 'required|string|max:255',
            'releasing.branch' => 'required|string|max:255',
            'releasing.date_opened' => 'required|date',
            'releasing.account_type' => 'required|string|max:255',
            'releasing.account_number' => 'required|string|max:255',
            'requirements.contract' => 'nullable|image|max:5120', // 5MB = 5 * 1024 KB
            'requirements.oec' => 'nullable|image|max:5120',
            'requirements.passport' => 'nullable|image|max:5120',
            'requirements.seamans_book' => 'nullable|image|max:5120',
            'requirements.e_reg' => 'nullable|image|max:5120',
            'requirements.sirb' => 'nullable|image|max:5120',
            'requirements.bill' => 'nullable|image|max:5120',
            'requirements.valid_id_1' => 'nullable|image|max:5120',
            'requirements.valid_id_2' => 'nullable|image|max:5120',
            'requirements.marriage_contract' => 'nullable|image|max:5120',
            'requirements.send_it_thru' => 'nullable|string|max:255',
        ];
    }
}
