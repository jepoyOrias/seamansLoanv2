<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactReference extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_information_id',
        'name',
        'address',
        'mobile_number',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_information_id');
    }
}
