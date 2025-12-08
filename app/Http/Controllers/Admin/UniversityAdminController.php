<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;

class UniversityAdminController extends Controller
{
    // Show all university applications
    public function index()
    {
        $universityApplications = ScholarshipApplication::latest()->get();
        return view('admin.university.index', compact('universityApplications'));
    }

    // View single application
    public function view($id)
    {
        $application = ScholarshipApplication::findOrFail($id);
        return view('admin.university.view', compact('application'));
    }

    // Update application status and award amount
    public function update(Request $request, $id)
    {
        $application = ScholarshipApplication::findOrFail($id);

        // Validate status and award_amount
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'award_amount' => 'required|in:5000,10000,15000,20000,25000,30000',
        ]);

        $application->status = $request->status;
        $application->award_amount = $request->award_amount;
        $application->save();

        return redirect()->back()->with('success', 'Application updated successfully.');
    }
}
