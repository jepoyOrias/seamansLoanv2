<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class PersonalInformation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'email',
        'civil_status',
        'birth_date',
        'place_of_birth',
        'present_address',
        'present_address_length',
        'address_ownership',
        'permanent_address',
        'permanent_address_length',
        'provincial_address',
        'provincial_address_length',
        'TIN_NO',
        'SSS_NO',
        'nationality',
        'phone_number',
        'facebook_account_name',
        'education',
        'source_of_fund',
    ];


    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function loanInformation()
    {
        return $this->hasOne(LoanInformation::class);
    }

    public function employerInformation()
    {
        return $this->hasOne(EmployerInformation::class);
    }

    public function contactReferences()
    {
        return $this->hasMany(ContactReference::class);
    }

    public function coborrowers()
    {
        return $this->hasMany(Coborrower::class);
    }

    public function requirements()
    {
        return $this->hasOne(Requirements::class);
    }
}
