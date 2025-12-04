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

    // Update application status
    public function update(Request $request, $id)
    {
        $application = ScholarshipApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Application updated successfully.');
    }
}
