<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdfScholarship;
use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Eager load the user relationship for both application types
        $cdfApplications = CdfScholarship::with('user')->latest()->paginate(20);
        $universityApplications = ScholarshipApplication::with('user')->latest()->paginate(20);

        return view('admin.dashboard', compact('cdfApplications', 'universityApplications'));
    }
}
