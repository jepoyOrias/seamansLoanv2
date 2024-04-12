<?php

namespace App\Http\Controllers;

use App\Mail\RequirementsVerificationMail;
use App\Models\LoanInformation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    // This method accepts an array of IDs and sends notifications to the emails associated with those IDs
    public function sendEmailNotification(Request $request)
    {
        $failedIds = [];
        $successIds = [];
        $loanIds = $request->input('loanIds');
        $typeOfEmail = $request->input('typeOfEmail');
        $statusId = $request->input('statusId');
        // Check if $loanIds is null or not an array
        if (!is_array($loanIds)) {
            return response()->json(['error' => 'Invalid or missing loanIds parameter'], 400);
        }
    
        foreach ($loanIds as $id) {
            try {
                // Fetch user data from the database
                $borrower = LoanInformation::with([
                    'personalInformation', 
                    'releasing',
                    'personalInformation.contactReferences',
                    'personalInformation.coborrowers', 
                    'personalInformation.employerInformation'
                ])->findOrFail($id);
                // Send email notification
                Mail::to($borrower->personalInformation->email)->send(new RequirementsVerificationMail($borrower, $typeOfEmail));

                $borrower->status_id = $statusId;
                $borrower->save();
                $successIds[] = $id;
            } catch (ModelNotFoundException $exception) {
                // Log error for missing loan information
                Log::error('Loan information not found for ID: ' . $id);
                $failedIds[] = $id;
                return response()->json(['error' => 'Loan information not found for ID: ' . $id], 404);
            } catch (\Exception $exception) {
                // Log general error for sending notification
                Log::error('Error sending notification for ID: ' . $id . ', Error: ' . $exception->getMessage());
                return response()->json(['error' => 'Failed to send notification for this email address: ' .$borrower->personalInformation->email], 500);
                $failedIds[] = $id;
            }
        }
    
        $response = [
            'success_ids' => $successIds,
            'failed_ids' => $failedIds
        ];
    
        return response()->json($response);
    }}
