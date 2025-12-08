<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdfScholarship;
use App\Models\Application; // <-- correct model for university/college applications
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Latest CDF applications
        $cdfApplications = CdfScholarship::latest()->paginate(20); 

        // Latest University/College applications
        $universityApplications = Application::whereNotNull('institution_name')
            ->latest()
            ->paginate(20);

        return view('admin.dashboard', compact('cdfApplications', 'universityApplications'));
    }
}
