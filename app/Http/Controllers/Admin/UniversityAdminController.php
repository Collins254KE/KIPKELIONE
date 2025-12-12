<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;

class UniversityAdminController extends Controller
{
    public function index()
    {
        $universityApplications = ScholarshipApplication::latest()->paginate(20);
        return view('admin.university.index', compact('universityApplications'));
    }

    public function view($id)
    {
        $application = ScholarshipApplication::findOrFail($id);
        return view('admin.university.view', compact('application'));
    }

    public function update(Request $request, $id)
    {
        $application = ScholarshipApplication::findOrFail($id);

        $rules = [
            'status' => 'required|in:pending,approved,rejected',
        ];

        if ($request->status === 'rejected') {
            $rules['rejection_reason'] = 'required|string|max:500';
        } else {
            $rules['award_amount'] = 'required|in:5000,10000,15000,20000,25000,30000';
        }

        $request->validate($rules);

        $application->status = $request->status;
        $application->award_amount = $request->status !== 'rejected' ? $request->award_amount : null;
        $application->rejection_reason = $request->status === 'rejected' ? $request->rejection_reason : null;

        $application->save();

        return redirect()->back()->with('success', 'Application updated successfully.');
    }

    // -------------------------
    // Report Generation
    // -------------------------
    public function generateReport($format = 'pdf')
    {
        $applications = ScholarshipApplication::latest()->get();

        switch (strtolower($format)) {
            case 'csv':
                return $this->generateCSV($applications, 'university_applications.csv');

            case 'pdf':
                $pdf = Pdf::loadView('admin.reports.university_pdf', compact('applications'));
                return $pdf->download('university_applications.pdf');

            case 'word':
                return $this->generateWord($applications, 'university_applications.docx');

            default:
                abort(400, 'Invalid report format');
        }
    }

    // -------------------------
    // CSV Helper
    // -------------------------
    protected function generateCSV($applications, $filename)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($applications) {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Name','Serial','Admission No','Gender','PWD','Institution','Father Name','Mother Name',
                'Ward','Location','Sub-location','Status','Award','Rejection Reason','Submitted'
            ]);

            foreach ($applications as $app) {
                fputcsv($file, [
                    $app->full_name ?? 'N/A',
                    $app->serial_number ?? 'N/A',
                    $app->admission_no ?? 'N/A',
                    $app->gender ?? 'N/A',
                    $app->pwd ?? '-',
                    $app->institution_name ?? 'N/A',
                    $app->father_name ?? 'N/A',
                    $app->mother_name ?? 'N/A',
                    $app->birth_ward ?? '-',
                    $app->birth_location ?? '-',
                    $app->birth_sublocation ?? '-',
                    $app->status ?? 'N/A',
                    $app->award_amount ?? '-',
                    $app->rejection_reason ?? '-',
                    $app->created_at?->format('d M Y H:i') ?? 'N/A',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    // -------------------------
    // Word Helper
    // -------------------------
    protected function generateWord($applications, $filename)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $table = $section->addTable();

        $headers = [
            'Name','Serial','Admission No','Gender','PWD','Institution','Father Name','Mother Name',
            'Ward','Location','Sub-location','Status','Award','Rejection Reason','Submitted'
        ];

        $table->addRow();
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header);
        }

        foreach ($applications as $app) {
            $table->addRow();
            $table->addCell(2000)->addText($app->full_name ?? 'N/A');
            $table->addCell(1500)->addText($app->serial_number ?? 'N/A');
            $table->addCell(1500)->addText($app->admission_no ?? 'N/A');
            $table->addCell(1000)->addText($app->gender ?? 'N/A');
            $table->addCell(1000)->addText($app->pwd ?? '-');
            $table->addCell(2000)->addText($app->institution_name ?? '-');
            $table->addCell(2000)->addText($app->father_name ?? '-');
            $table->addCell(2000)->addText($app->mother_name ?? '-');
            $table->addCell(1500)->addText($app->birth_ward ?? '-');
            $table->addCell(1500)->addText($app->birth_location ?? '-');
            $table->addCell(1500)->addText($app->birth_sublocation ?? '-');
            $table->addCell(1000)->addText($app->status ?? '-');
            $table->addCell(1000)->addText($app->award_amount ?? '-');
            $table->addCell(2000)->addText($app->rejection_reason ?? '-');
            $table->addCell(1500)->addText($app->created_at?->format('d M Y H:i') ?? '-');
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'UNI') . '.docx';
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }

    // -------------------------
    // Analysis Method
    // -------------------------
    public function analysis()
    {
        $applications = ScholarshipApplication::all();

        // Status
        $statusCounts = $applications->groupBy('status')->map->count();

        // Gender normalized
        $genderCounts = collect([
            'Male' => $applications->whereIn('gender', ['male','Male'])->count(),
            'Female' => $applications->whereIn('gender', ['female','Female'])->count(),
        ]);

        // PWD normalized
        $pwdCounts = collect([
            'Yes' => $applications->whereIn('pwd', ['yes','Yes'])->count(),
            'No' => $applications->whereIn('pwd', ['no','No'])->count(),
        ]);

        // Ward distribution
        $wardCounts = $applications->groupBy('birth_ward')->map->count();

        // Institution distribution
        $institutionCounts = $applications->groupBy('institution_name')->map->count();

        return view('admin.university.analysis', compact(
            'statusCounts',
            'genderCounts',
            'pwdCounts',
            'wardCounts',
            'institutionCounts'
        ));
    }
}
