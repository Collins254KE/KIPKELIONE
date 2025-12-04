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
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $application = CdfScholarship::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return redirect()->route('admin.cdf.view', $id)
                         ->with('success', 'Application status updated successfully.');
    }
}
