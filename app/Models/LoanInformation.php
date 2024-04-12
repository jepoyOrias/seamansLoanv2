<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LoanInformation extends Model
{
    use HasFactory , Notifiable;
    
    protected $fillable = [
        'uuid',
        'personal_information_id', // Corrected typo
        'loan_purpose',
        'amount',
        'interest_rate',
        'term_months',
        'status_id',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_information_id');
    }

    public function releasing()
    {
        return $this->hasOne(Releasing::class);
    }
    
    public function status()
    {
        return $this->belongsTo(LoanStatus::class, 'status_id');
    }

    public function repayments()
    {
        return $this->hasMany(Repayment::class);
    }

}
