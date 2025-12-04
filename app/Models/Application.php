<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
   protected $fillable = [
    'user_id',
    'session_id',          // <-- add this

    'application_year',      // add this
    'full_name',
    'national_id',
    'gender',
    'pwd',
    'student_phone',

    'father_name',
    'father_id',
    'father_phone',
    'father_occupation',
    'father_email',

    'mother_name',
    'mother_id',
    'mother_phone',
    'mother_occupation',
    'mother_email',

    'birth_ward',
    'birth_location',
    'birth_sublocation',
    'birth_village',

    'institution_name',
    'admission_no',
    'level_of_study',
    'mode_of_study',
    'year_of_study',
    'semester',
    'course_duration',

    'status',           // add this
    'serial_number',    // add this
];

}
