<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CdfScholarship;

class CdfAdminController extends Controller
{
    public function index()
    {
        $applications = CdfScholarship::latest()->paginate(20);
        return view('admin.cdf.index', compact('applications'));
    }

    public function view($id)
    {
        $application = CdfScholarship::findOrFail($id);
        return view('admin.cdf.view', compact('application'));
    }

    public function update(Request $request, $id)
    {
        // Validate status and award_amount
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'award_amount' => 'required|in:5000,10000,15000,20000,25000,30000',
        ]);

        $application = CdfScholarship::findOrFail($id);
        $application->status = $request->status;
        $application->award_amount = $request->award_amount;
        $application->save();

        return redirect()->route('admin.cdf.view', $id)
                         ->with('success', 'Application updated successfully.');
    }
}
