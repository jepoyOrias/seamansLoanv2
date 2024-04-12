<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\TempPasswordEmail;
use App\Models\LoanInformation;
use App\Models\User;
use App\Services\RepaymentService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as Validator;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{

   
    protected $repaymentService;

    public function __construct(RepaymentService $repaymentService)
    {
        $this->repaymentService = $repaymentService;
    }

    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'loan.id' => 'required|exists:loan_information,id',
            'loan.start_date' => 'required|date',
            'loan.term_months' => 'required|integer',
            'loan.monthly_amortization' => 'required|numeric',
            'loan.grace_period' => 'boolean'
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            // Retrieve loan information
            $loanInformation = LoanInformation::with('personalInformation')->findOrFail($request["loan"]["id"]);

            if (!$loanInformation) {
                return response()->json(['message' => 'Error: Loan information not found'], 404);
            }

            // Parse the start date input
            $startDate = Carbon::parse($request["loan"]["start_date"]);
           
            // Get the term months of the loan
            $termMonths = $request["loan"]["term_months"];
            $monthlyAmortization = $request["loan"]['monthly_amortization'];
            $gracePeriod = $request["loan"]['grace_period'];
           
            // Create repayments
            $this->repaymentService->createRepaymentsForLoan($loanInformation, $termMonths, $monthlyAmortization, $gracePeriod);
            $loanInformation->update([
                'term_months' => $termMonths
            ]);
            // Proceed with user registration
            $userFullName = $loanInformation->personalInformation->lastname . ' ' . $loanInformation->personalInformation->firstname;
            $userEmail = $loanInformation->personalInformation->email;

            $tempPassword = Str::random(8);

            $user = User::create([
                'name' => $userFullName,
                'email' => $userEmail,
                'password' => Hash::make($tempPassword),
                'role_id' => 3,
                'personal_information_id' => $loanInformation->personalInformation->id
            ]);

            event(new Registered($user));
            $this->sendTempPasswordEmail($userEmail, $tempPassword, $user);
            
            $loanInformation->update([
                'status_id' => 8,
            ]);

            DB::commit();

            return response()->json(['message' => 'User registered successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
    private function sendTempPasswordEmail($email, $password,$user)
    {
        // Send an email to the user with the temporary password
        Mail::to($email)->send(new TempPasswordEmail($user,$password));
    }
}
