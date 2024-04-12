<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coborrower extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_information_id',
        'name',
        'email',
        'civil_status',
        'birth_date',
        'place_of_birth',
        'present_address',
        'address_ownership',
        'permanent_address',
        'provincial_address',
        'nationality',
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
