<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'personal_information_id',
        'name_of_employer',
        'office_address',
        'position',
    ];
    
    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'personal_information_id');
    }
}
