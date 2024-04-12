<?php

namespace App\Http\Controllers;

use App\Models\LoanInformation;
use App\Models\Repayment;
use App\Services\RepaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepaymentController extends Controller
{

    protected $repaymentService;

    public function __construct(RepaymentService $repaymentService)
    {
        $this->repaymentService = $repaymentService;
    }

    

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'id' => 'required|exists:loan_information,id', // Assuming the loan information ID is sent as 'id'
        ]);

        // Retrieve loan information
        $loanInformation = LoanInformation::find($request->id);

        if (!$loanInformation) {
            return response()->json(['message' => 'Error: Loan information not found'], 404);
        }

        // Parse the start date input
        $startDate = Carbon::parse($request->startDateInput);

        // Get the term months of the loan
        $termMonths = $loanInformation->termMonths;
        // Create repayments
        return $this->repaymentService->createRepaymentsForLoan($loanInformation,$request->termMonths , $request->monthly_amortization, $request->grace_period);

        return response()->json(['message' => 'Repayments created successfully'], 200);
    }


    public function storeReceipt(Request $request)
    {

        $request->validate([
            'receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // Adjust allowed file types and size as needed
        ]);

       
        // Store the receipt file
      
        $repayment = Repayment::findOrFail($request->repayment_id);
        $previousReceiptPath = $repayment->receipt;
        if ($previousReceiptPath) {
            Storage::disk('public')->delete($previousReceiptPath);
        }
        $path = $request->file('receipt')->store('images/receipts', 'public');
        $repayment->update(['receipt' => $path, 'status_id' => 10]);

        return back()->with('success', 'Receipt uploaded successfully');
    }

    public function approveReceipt(Request $request){
     
       $repayment =  Repayment::findOrFail($request["data"]["id"]);
        $repayment->update([
            'status_id'=>11
        ]);
        return back()->with('success', 'Receipt approved successfully');
    }
    
}
