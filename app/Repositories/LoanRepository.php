<?php

namespace App\Repositories;

use App\Models\Coborrower;
use App\Models\ContactReference;
use App\Models\LoanInformation;
use App\Models\PersonalInformation;
use App\Models\Releasing;
use App\Models\Requirements;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LoanRepository
{
    protected $loanInformation;

    public function __construct(LoanInformation $loanInformation)
    {
        $this->loanInformation = $loanInformation;
    }

    public function getLoansWithRelatedData(array $params, $statusId = null)
    {
        // Initialize query builder for loans
        $query = $this->loanInformation->with(
            'status',
            'personalInformation',
            'releasing',
            'personalInformation.contactReferences',
            'personalInformation.coborrowers',
            'personalInformation.employerInformation',
            'repayments'
        );
        // Check if status ID is provided as the second parameter
        if ($statusId !== null) {
            $query->where('status_id', $statusId);
        }

        // Fetch loans
        return $query->get();
    }

    public function createLoanWithRelatedData(array $data, $id = null)
    {
        DB::beginTransaction();

        try {
            // Create PersonalInformation
            $personalInformation = PersonalInformation::create($data['personal_information']);

            // Create EmployerInformation
            $personalInformation->employerInformation()->create($data['employer_information']);

            // Create ContactReferences
            $personalInformation->contactReferences()->createMany($data['contact_references']);
            // Create Requirements and handle file uploads
            $requirementsData = $data['requirements'];
            $requirementsData['personal_information_id'] = $personalInformation->id;

            $requirementsAttributes = [];
            foreach ($requirementsData as $requirementName => $requirementFile) {
                if ($requirementFile instanceof \Illuminate\Http\UploadedFile) {
                    // Handle file upload
                    $filePath = $requirementFile->store("images/personal_information/{$personalInformation->id}/requirements", 'public');

                    // Save file path to the requirements attributes
                    $requirementsAttributes[$requirementName] = $filePath;
                } else {
                    // If the requirement is not a file upload, just assign its value
                    $requirementsAttributes[$requirementName] = $requirementFile;
                }
            }

            // Create Requirements model and save it
            $requirements = Requirements::create($requirementsAttributes);

            // Create Coborrowers
            foreach ($data['coborrowers'] as $coborrowerData) {
                $coborrowerData['personal_information_id'] = $personalInformation->id;
                $coborrower = Coborrower::create($coborrowerData);
                $personalInformation->coborrowers()->save($coborrower);
            }


            // Create Loan
            $timestamp = time();

            // Generate a random number
            $randomNumber = mt_rand(1000, 9999);
            // Combine timestamp and random number to create a reference number
            $referenceNumber = 'sl-' . $timestamp . $randomNumber;
            $data['loan_information']["personal_information_id"] = $personalInformation->id;
            $data['loan_information']['uuid'] = $referenceNumber;
            $data['loan_information']["status_id"] = $data['loanInformation']["status_id"] ?? 1;
            $loan = LoanInformation::create($data['loan_information']);

            // Create Releasing
            $releasingData = $data['releasings'];
            $releasingData['loan_information_id'] = $loan->id;
            Releasing::create($releasingData);

            DB::commit();

            return $loan;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e; // Re-throw the exception to propagate it upwards
        }
    }

    public function updateLoanWithRelatedData(array $data, $id)
    {
        DB::beginTransaction();

        try {
            // Find the existing loan record
            $loan = LoanInformation::findOrFail($id);
            // Update PersonalInformation
            $loan->personalInformation->update($data['personal_information']);
            $loan->personalInformation->employerInformation->update($data["personal_information"]['employer_information']);
            // Update Requirements
            $requirementsData = $data['requirements'];
            $requirements = Requirements::where('personal_information_id', $loan->personalInformation->id)->firstOrFail();

            $requirementsAttributes = [];
            foreach ($requirementsData as $requirementName => $requirementFile) {
                if ($requirementFile instanceof \Illuminate\Http\UploadedFile) {
                    // Handle file upload
                    $filePath = $requirementFile->store("images/personal_information/{$loan->personalInformation->id}/requirements", 'public');

                    // Delete the existing file if it exists
                    $existingFilePath = $requirements->$requirementName;
                    if ($existingFilePath && Storage::disk('public')->exists($existingFilePath)) {
                        Storage::disk('public')->delete($existingFilePath);
                    }

                    // Update the file path in the requirements attributes
                    $requirementsAttributes[$requirementName] = $filePath;
                } else {
                    // If the requirement is not a file upload, just update its value
                    $requirementsAttributes[$requirementName] = $requirementFile;
                }
            }

            // Update the requirements with the new attributes
            $requirements->update($requirementsAttributes);
            // Update ContactReferences
            foreach ($data["personal_information"]['contact_references'] as $referenceData) {
                $contactReference = ContactReference::findOrFail($referenceData['id']);
                $contactReference->update($referenceData);
            }

            // Update Coborrowers
            foreach ($data["personal_information"]['coborrowers'] as $coborrowerData) {
                $coborrower = Coborrower::findOrFail($coborrowerData['id']);
                $coborrower->update($coborrowerData);
            }

            // Update Loan
            $loan->update($data);

            // Update Releasing
            $releasing = Releasing::findOrFail($loan->releasing->id);
            $releasing->update($data['releasing']);

            DB::commit();

            return $loan;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e; // Re-throw the exception to propagate it upwards
        }
    }
}
