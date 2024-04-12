<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Releasing extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_information_id',
        'bank',
        'branch',
        'date_opened',
        'account_type',
        'account_number',
    ];

    public function loanInformation()
    {
        return $this->belongsTo(LoanInformation::class, 'loan_information_id');
    }
}
