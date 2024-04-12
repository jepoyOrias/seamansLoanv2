<?php

namespace App\Services;

use App\Repositories\LoanRepository;

class LoanService
{
    protected $loanRepository;

    public function __construct(LoanRepository $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    public function getLoansWithRelatedData($request ,$statusId = null)
    {
        $loans = $this->loanRepository->getLoansWithRelatedData($request,$statusId);
        return  $loans ;
    }
    
    public function createLoanWithRelatedData(array $data ,$id = null)
    {
        return $this->loanRepository->createLoanWithRelatedData($data , $id);
    }

    public function updateLoanWithRelatedData(array $data ,$id)
    {
        return $this->loanRepository->updateLoanWithRelatedData($data , $id);
    }
}