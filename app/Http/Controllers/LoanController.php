<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanInformationStoreRequest;
use App\Http\Requests\LoanInformationUpdateRequest;
use App\Models\LoanInformation;
use App\Models\loanStatus;
use App\Models\PersonalInformation;
use App\Models\Repayment;
use App\Models\User;
use App\Services\LoanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function index(Request $request)
    {
          // Retrieve loans with related data using the service
         $user =  Auth::user();

          if($user->role_id === 1){
            if ($user->hasVerifiedEmail()) {
                // Retrieve loans with related data using the service
                $loans = $this->loanService->getLoansWithRelatedData($request->all());
                $statuses = loanStatus::all();

                return Inertia::render('Dashboard', [
                    'loans' => $loans,
                    'statuses' => $statuses
                ]);
            } else {
                // Redirect to the email verification notice route
                return redirect()->route('verification.notice');
            }
          } 

          $personalInformationID = Auth::user()->personal_information_id;
          $userLoan = LoanInformation::with(['repayments','repayments.status'])->where('personal_information_id',$personalInformationID)->get();
         

        //      $userLoan =  Repayment::with('loanInformation')
        //    ->whereHas('loanInformation', function ($query) use ($personalInformationID) {
        //        $query->where('personal_information_id', $personalInformationID);
        //    })
        //    ->get();

          return Inertia::render('UserDashboard', [
            'loans' => $userLoan ,
        ]);
          
      

    }

    public function searchByReference(Request $request)
    {
        $query = $request->input('query');
    
        // Query the database
        $loanInformation = null;
        if ($query) {
            $loanInformation = LoanInformation::with('status')
                ->where('uuid', 'like', '%' . $query . '%')
                ->first();
        }
    
        return Inertia::render('Reference', [
            'loanInformation' => $loanInformation ?? null,
            'query' => $query,
            'canLogin' => true,
        ]);
    }

    
    
    
    public function initialApplication(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 1);

        $statuses= loanStatus::all();
        return Inertia::render('InitialApplication', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    public function informationVerification(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 2);
        $statuses= loanStatus::all();
        return Inertia::render('InformationVerification', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    public function forInterview(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(),3);
        $statuses= loanStatus::all();
        return Inertia::render('ForInterview', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);
    }

    public function forApproval(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 4);
        $statuses= loanStatus::all();
        return Inertia::render('ForApproval', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    public function approved(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 5);
        $statuses= loanStatus::all();
        return Inertia::render('Approved', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    public function declined(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 6);
        $statuses= loanStatus::all();
        return Inertia::render('Declined', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    public function releasing(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 7);
        $statuses= loanStatus::all();
        return Inertia::render('ForReleasing', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    public function released(Request $request)
    {
          // Retrieve loans with related data using the service
        $loans = $this->loanService->getLoansWithRelatedData($request->all(), 8);
        $statuses= loanStatus::all();
        return Inertia::render('Released', [
            'loans' => $loans,
            'statuses' => $statuses
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoanInformationStoreRequest $loanInformationRequest)
    {
       $validatedData = $loanInformationRequest->validated();
       $createdLoan =  $this->loanService->createLoanWithRelatedData($validatedData);
       return response()->json(['loan' => $createdLoan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loan = LoanInformation::with(['personalInformation', 
        'releasing',
        'personalInformation.contactReferences',
        'personalInformation.coborrowers', 
        'personalInformation.employerInformation'])->find($id);

        return response()->json(['loan' => $loan], 201);
    }
    public function update(LoanInformationUpdateRequest $request, $id)
    {
        $loanInformation = LoanInformation::with(['personalInformation', 'personalInformation.coborrowers'])->findOrFail($id);
    
        $request->validate([
            'personal_information.email' => 'required|string|email|max:255|unique:personal_information,email,'.$loanInformation->personalInformation->id,
            'coborrowers.*.email' => 'required|string|email|max:255|unique:coborrowers,email,'.$loanInformation->personalInformation->coborrowers->pluck('id')->implode(','),
        ]);
    
        $updatedData = $this->loanService->updateLoanWithRelatedData($request->all(), $id);
    
        return response()->json(['Success' => $updatedData], 200);
    }

}
