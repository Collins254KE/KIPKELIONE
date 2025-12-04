<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdfScholarship extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'cdf_scholarships';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'session_id',
        'application_year',
        'serial_number',
        'status',

        'full_name',
        'birth_cert',
        'pwd',
        'gender',
        
        'admission_no',
        'school_name',
        'address',
        
        'father_name',
        'father_id',
        'father_phone',
        'mother_name',
        'mother_id',
        'mother_phone',
        
        'birth_ward',
        'birth_location',
        'birth_sublocation',
        'birth_village',
        
        'principal_name',
        'principal_letter',
    ];

    // Enable timestamps
    public $timestamps = true;
}
