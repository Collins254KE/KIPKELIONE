<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Str;


class ScholarshipController extends Controller
{
    /**
     * Show the CDF Scholarship form and previous applications
     */
    public function showForm()
    {
        $sessionId = session()->getId();

        $applications = auth()->check()
            ? Application::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get()
            : Application::where('session_id', $sessionId)->orderBy('created_at', 'desc')->get();

        return view('scholarship', compact('applications'));
    }

    /**
     * Handle form submission
     */
    public function submitForm(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'national_id' => 'required|string|max:20',
            'gender' => 'required|string',
            'pwd' => 'nullable|string',
            'student_phone' => 'required|string|max:15',
            'father_name' => 'required|string|max:255',
            'father_id' => 'required|string|max:20',
            'father_phone' => 'required|string|max:15',
            'father_occupation' => 'nullable|string|max:255',
            'father_email' => 'nullable|email|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_id' => 'required|string|max:20',
            'mother_phone' => 'required|string|max:15',
            'mother_occupation' => 'nullable|string|max:255',
            'mother_email' => 'nullable|email|max:255',
            'birth_ward' => 'required|string|max:255',
            'birth_location' => 'required|string|max:255',
            'birth_sublocation' => 'required|string|max:255',
            'birth_village' => 'nullable|string|max:255',
            'institution_name' => 'required|string|max:255',
            'admission_no' => 'required|string|max:50',
            'level_of_study' => 'required|string|max:50',
            'mode_of_study' => 'required|string|max:50',
            'year_of_study' => 'required|numeric',
            'semester' => 'required|numeric',
            'course_duration' => 'required|string|max:20',
        ]);

        $userId = auth()->id(); // null if guest
        $sessionId = session()->getId();

        try {
            Application::create([
                'user_id' => $userId,
                'session_id' => $sessionId,
                'application_year' => date('Y'),
                'serial_number' => 'SCH-' . strtoupper(Str::random(6)),
                'status' => 'pending',

                'full_name' => $request->full_name,
                'national_id' => $request->national_id,
                'gender' => $request->gender,
                'pwd' => $request->pwd,
                'student_phone' => $request->student_phone,

                'father_name' => $request->father_name,
                'father_id' => $request->father_id,
                'father_phone' => $request->father_phone,
                'father_occupation' => $request->father_occupation,
                'father_email' => $request->father_email,

                'mother_name' => $request->mother_name,
                'mother_id' => $request->mother_id,
                'mother_phone' => $request->mother_phone,
                'mother_occupation' => $request->mother_occupation,
                'mother_email' => $request->mother_email,

                'birth_ward' => $request->birth_ward,
                'birth_location' => $request->birth_location,
                'birth_sublocation' => $request->birth_sublocation,
                'birth_village' => $request->birth_village,

                'institution_name' => $request->institution_name,
                'admission_no' => $request->admission_no,
                'level_of_study' => $request->level_of_study,
                'mode_of_study' => $request->mode_of_study,
                'year_of_study' => $request->year_of_study,
                'semester' => $request->semester,
                'course_duration' => $request->course_duration,
            ]);

            return redirect()->route('scholarship.form')
                             ->with('success', 'Application submitted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('scholarship.form')
                             ->with('error', 'Failed: ' . $e->getMessage());
        }
    }
public function showStatus()
{
    // Fetch all applications for logged-in user
    $applications = auth()->check()
        ? Application::where('user_id', auth()->id())
                     ->orderBy('created_at', 'desc')
                     ->get()
        : collect(); // empty if guest

    return view('status', compact('applications'));
}

    /**
     * View a single application
     */
    public function viewApplication($id)
    {
        $application = Application::findOrFail($id);
        return view('scholarship_view', compact('application'));
    }
}
