<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CdfScholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;

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
            'award_amount' => 'nullable|in:5000,10000,15000,20000,25000,30000',
            'rejection_reason' => 'nullable|string|max:1000',
        ]);

        $application = CdfScholarship::findOrFail($id);
        $application->status = $request->status;

        if ($request->status === 'rejected') {
            $application->award_amount = null;
            $application->rejection_reason = $request->rejection_reason;
        } else {
            $application->award_amount = $request->award_amount;
            $application->rejection_reason = null;
        }

        $application->save();

        return redirect()->route('admin.cdf.view', $id)
                         ->with('success', 'Application updated successfully.');
    }

    // -------------------------
    // Report Generation
    // -------------------------
    public function generateReport($format = 'pdf')
    {
        $applications = CdfScholarship::latest()->get();

        switch (strtolower($format)) {
            case 'csv':
                return $this->generateCSV($applications, 'cdf_applications.csv');

            case 'pdf':
                $pdf = Pdf::loadView('admin.reports.cdf_pdf', compact('applications'));
                return $pdf->download('cdf_applications.pdf');

            case 'word':
                return $this->generateWord($applications, 'cdf_applications.docx');

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

            // CSV Header
            fputcsv($file, [
                'Full Name', 'Birth Cert', 'Gender', 'PWD',
                'Admission No', 'School Name', 'School Address',
                'Father Name', 'Father ID', 'Father Phone',
                'Mother Name', 'Mother ID', 'Mother Phone',
                'Ward', 'Location', 'Sub-location', 'Village',
                'Head Teacher', 'Status', 'Serial', 'Award', 'Rejection Reason', 'Submitted'
            ]);

            foreach ($applications as $app) {
                fputcsv($file, [
                    $app->full_name ?? 'N/A',
                    $app->birth_cert ?? 'N/A',
                    $app->gender ?? 'N/A',
                    $app->pwd ?? '-',
                    $app->admission_no ?? 'N/A',
                    $app->school_name ?? 'N/A',
                    $app->address ?? '-',
                    $app->father_name ?? 'N/A',
                    $app->father_id ?? '-',
                    $app->father_phone ?? '-',
                    $app->mother_name ?? 'N/A',
                    $app->mother_id ?? '-',
                    $app->mother_phone ?? '-',
                    $app->birth_ward ?? '-',
                    $app->birth_location ?? '-',
                    $app->birth_sublocation ?? '-',
                    $app->birth_village ?? '-',
                    $app->principal_name ?? '-',
                    $app->status ?? '-',
                    $app->serial_number ?? '-',
                    $app->award_amount ?? '-',
                    $app->rejection_reason ?? '-',
                    $app->created_at?->format('d M Y H:i') ?? '-',
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
            'Full Name', 'Birth Cert', 'Gender', 'PWD',
            'Admission No', 'School Name', 'School Address',
            'Father Name', 'Father ID', 'Father Phone',
            'Mother Name', 'Mother ID', 'Mother Phone',
            'Ward', 'Location', 'Sub-location', 'Village',
            'Head Teacher', 'Status', 'Serial', 'Award', 'Rejection Reason', 'Submitted'
        ];

        $table->addRow();
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header);
        }

        foreach ($applications as $app) {
            $table->addRow();
            $table->addCell(2000)->addText($app->full_name ?? 'N/A');
            $table->addCell(1500)->addText($app->birth_cert ?? 'N/A');
            $table->addCell(1000)->addText($app->gender ?? 'N/A');
            $table->addCell(1000)->addText($app->pwd ?? '-');
            $table->addCell(1500)->addText($app->admission_no ?? '-');
            $table->addCell(2000)->addText($app->school_name ?? '-');
            $table->addCell(2000)->addText($app->address ?? '-');
            $table->addCell(2000)->addText($app->father_name ?? '-');
            $table->addCell(1500)->addText($app->father_id ?? '-');
            $table->addCell(1500)->addText($app->father_phone ?? '-');
            $table->addCell(2000)->addText($app->mother_name ?? '-');
            $table->addCell(1500)->addText($app->mother_id ?? '-');
            $table->addCell(1500)->addText($app->mother_phone ?? '-');
            $table->addCell(1500)->addText($app->birth_ward ?? '-');
            $table->addCell(1500)->addText($app->birth_location ?? '-');
            $table->addCell(1500)->addText($app->birth_sublocation ?? '-');
            $table->addCell(1500)->addText($app->birth_village ?? '-');
            $table->addCell(2000)->addText($app->principal_name ?? '-');
            $table->addCell(1000)->addText($app->status ?? '-');
            $table->addCell(1000)->addText($app->serial_number ?? '-');
            $table->addCell(1000)->addText($app->award_amount ?? '-');
            $table->addCell(2000)->addText($app->rejection_reason ?? '-');
            $table->addCell(1500)->addText($app->created_at?->format('d M Y H:i') ?? '-');
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'CDF') . '.docx';
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }

    // -------------------------
    // Analysis
    // -------------------------
    public function analysis()
    {
        $applications = CdfScholarship::all();

        $statusCounts = $applications->groupBy('status')->map->count();
        $genderCounts = $applications->groupBy('gender')->map->count();
        $pwdCounts = $applications->groupBy('pwd')->map->count();

        return view('admin.cdf.analysis', compact('statusCounts', 'genderCounts', 'pwdCounts'));
    }
}
