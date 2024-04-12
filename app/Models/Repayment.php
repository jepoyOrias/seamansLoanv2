<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_information_id',
        'start_date',
        'term_month',
        'due_date',
        'amount', // Add other repayment data fields as needed
        'receipt', // If you've added a column to store receipt file path or name
        'status_id'
    ];

    public function loanInformation()
    {
        return $this->belongsTo(LoanInformation::class);
    }

    public function status()
    {
        return $this->belongsTo(LoanStatus::class, 'status_id');
    }
}
