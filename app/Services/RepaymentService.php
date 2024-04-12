<?php
namespace App\Services;

use App\Models\Repayment;
use Carbon\Carbon;

class RepaymentService
{
    public function createRepaymentsForLoan($loanInformation, $termMonths ,$monthly_amortization ,$hasGracePeriod = false)
    {
      
        $currentDueDate = $loanInformation->updated_at;
       
        for ($i = 1; $i <= $termMonths; $i++) {
    
            if ($i == 1 && $hasGracePeriod) {
                // Add one month for the first repayment if there is a grace period
                $dueDate = $currentDueDate->copy()->addMonths(2)->subDay();
            } else {
                // Otherwise, add the regular number of months
                $dueDate = $currentDueDate->copy()->addMonths(1)->subDay();
            }
        
            $currentDueDate = $dueDate;
           
            // Create a new repayment record
            Repayment::create([
                'loan_information_id' => $loanInformation->id,
                'start_date' => $loanInformation->updated_at,
                'term_month' => $i,
                'due_date' => $currentDueDate,
                'amount' => $monthly_amortization,
                // Add other repayment data as needed
            ]);
    }
}
    
}