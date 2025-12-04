<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipApplication extends Model
{
    use HasFactory;

    protected $table = 'scholarship_applications'; // matches your DB table

    protected $fillable = [
        'full_name',
        'serial_number',
        'status',
        'gender',
        'institution_name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'email',
        'phone_number',
        'address',
        // Add any other fields present in your scholarship_applications table
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth', // if you want Carbon date handling
    ];
}
