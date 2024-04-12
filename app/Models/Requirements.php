<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_information_id',
        'contract',
        'oec',
        'passport',
        'seamans_book',
        'e_reg', 
        'sirb',
        'bill', 
        'valid_id_1',
        'valid_id_2',
        'marriage_contract',
        'send_it_thru',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class);
    }
}
