<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdfScholarship;
use App\Models\ScholarshipApplication; // <-- use this
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Use pagination for both
        $cdfApplications = CdfScholarship::latest()->paginate(20); 
        $universityApplications = ScholarshipApplication::latest()->paginate(20);

        return view('admin.dashboard', compact('cdfApplications', 'universityApplications'));
    }
}
