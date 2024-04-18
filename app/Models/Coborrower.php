<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coborrower extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_information_id',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'email',
        'civil_status',
        'gender',
        'birth_date',
        'place_of_birth',
        'present_address',
        'present_address_length',
        'address_ownership',
        'permanent_address',
        'permanent_address_length',
        'provincial_address',
        'provincial_address_length',
        'nationality',
        'TIN_NO',
        'SSS_NO',
        'phone_number',
        'facebook_account_name',
        'education',
        'source_of_fund',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_information_id');
    }
}
