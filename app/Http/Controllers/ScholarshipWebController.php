<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\ApplicationYear;
use Auth;
use DB;

class ScholarshipWebController extends Controller
{
    public function showForm()
    {
        $years = ApplicationYear::all();
        return view('scholarship', compact('years'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'county' => 'required',
            'ward' => 'required',
            'subcounty' => 'required|string',
            'kcpeMarks' => 'required|integer|min:0|max:600',
            'secSchoolName' => 'required|string',
            'fatherFirstName' => 'required|string',
            'motherFirstName' => 'required|string',
            // … Add all other required fields
        ]);

        // Check if user already applied
        if (Application::where('user_id', Auth::id())
            ->where('year', $request->year)
            ->where('bursary_type', 'scholarship')->exists()) {
            return redirect()->back()->withErrors('You have already submitted an application this year.');
        }

        DB::transaction(function () use ($request) {
            $application = new Application();
            $application->user_id = Auth::id();
            $application->bursary_type = 'scholarship';
            $application->application_year = $request->year;
            $application->firstName = $request->firstName;
            $application->middleName = $request->middleName;
            $application->lastName = $request->lastName;
            $application->dob = $request->dob;
            $application->gender = $request->gender;
            $application->county = $request->county;
            $application->ward_id = $request->ward;
            $application->subcounty = $request->subcounty;
            $application->kcpeMarks = $request->kcpeMarks;
            $application->secSchoolName = $request->secSchoolName;
            // … add other fields as needed
            $application->status = 0;
            $application->save();

            // You can reuse your Evidence, Family, MoreEvidence, Sibling logic here
            // For example: create father/mother/guardian records
        });

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}
