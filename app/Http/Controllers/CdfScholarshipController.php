<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CdfScholarship;

class CdfScholarshipController extends Controller
{
    /**
     * Display the bursary application form and application history
     */
    public function index()
    {
        $applications = CdfScholarship::where('user_id', Auth::id())->get();
        return view('apply', compact('applications'));
    }

    /**
     * Handle bursary application submission
     */
    public function submit(Request $request)
    {
        // Validate form data
        $request->validate([
            'application_year'    => 'required',
            'birth_cert'          => 'required',
            'full_name'           => 'required',
            'gender'              => 'required',
            'pwd'                 => 'nullable',

            'school_name'         => 'required',
            'admission_no'        => 'required',
            'address'             => 'required',

            'father_name'         => 'required',
            'father_id'           => 'required',
            'father_phone'        => 'required',

            'mother_name'         => 'required',
            'mother_id'           => 'required',
            'mother_phone'        => 'required',

            'birth_ward'          => 'required',
            'birth_location'      => 'required',
            'birth_sublocation'   => 'required',

            'principal_name'      => 'required',
            'principal_letter'    => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload principal's letter
        $principalLetterPath = $request->file('principal_letter')->store('principal_letters', 'public');

        // Save application
        $application = new CdfScholarship();
        $application->user_id             = Auth::id();
        $application->session_id          = session()->getId();
        $application->application_year    = $request->application_year;
        $application->birth_cert          = $request->birth_cert;
        $application->full_name           = $request->full_name;
        $application->gender              = $request->gender;
        $application->pwd                 = $request->pwd;

        $application->school_name         = $request->school_name;
        $application->admission_no        = $request->admission_no;
        $application->address             = $request->address;

        $application->father_name         = $request->father_name;
        $application->father_id           = $request->father_id;
        $application->father_phone        = $request->father_phone;

        $application->mother_name         = $request->mother_name;
        $application->mother_id           = $request->mother_id;
        $application->mother_phone        = $request->mother_phone;

        $application->birth_ward          = $request->birth_ward;
        $application->birth_location      = $request->birth_location;
        $application->birth_sublocation   = $request->birth_sublocation;
        $application->birth_village       = $request->birth_village;

        $application->principal_name      = $request->principal_name;
        $application->principal_letter    = $principalLetterPath;

        $application->status              = 'pending';
        $application->serial_number       = 'CDF-' . strtoupper(uniqid());

        $application->save();

        //return back()->with('success', 'Application submitted successfully!');
        // Instead of return back()
return redirect()->route('scholarship.cdf')
                 ->with('success', 'Application submitted successfully!');

    }

    /**
     * View a single bursary application
     */
    public function view($id)
    {
        $application = CdfScholarship::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // IMPORTANT: use your NEW view name
        return view('scholarship_cdf_view', compact('application'));
    }
}
