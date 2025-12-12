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

        if($request->status === 'rejected') {
            $application->award_amount = null; // hide award
            $application->rejection_reason = $request->rejection_reason; // save reason
        } else {
            $application->award_amount = $request->award_amount;
            $application->rejection_reason = null; // clear previous reason
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
            fputcsv($file, ['Name','Serial','Gender','Father Name','Mother Name','Status','Award','Rejection Reason','Submitted']);

            foreach ($applications as $app) {
                fputcsv($file, [
                    $app->full_name ?? 'N/A',
                    $app->serial_number ?? 'N/A',
                    $app->gender ?? 'N/A',
                    $app->father_name ?? 'N/A',
                    $app->mother_name ?? 'N/A',
                    $app->status ?? 'N/A',
                    $app->award_amount ?? 'N/A',
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

        // Header row
        $table->addRow();
        foreach (['Name','Serial','Gender','Father Name','Mother Name','Status','Award','Rejection Reason','Submitted'] as $header) {
            $table->addCell(2000)->addText($header);
        }

        // Data rows
        foreach ($applications as $app) {
            $table->addRow();
            $table->addCell(2000)->addText($app->full_name ?? 'N/A');
            $table->addCell(1500)->addText($app->serial_number ?? 'N/A');
            $table->addCell(1000)->addText($app->gender ?? 'N/A');
            $table->addCell(2000)->addText($app->father_name ?? 'N/A');
            $table->addCell(2000)->addText($app->mother_name ?? 'N/A');
            $table->addCell(1000)->addText($app->status ?? 'N/A');
            $table->addCell(1000)->addText($app->award_amount ?? 'N/A');
            $table->addCell(2000)->addText($app->rejection_reason ?? '-');
            $table->addCell(1500)->addText($app->created_at?->format('d M Y H:i') ?? 'N/A');
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'CDF') . '.docx';
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }

    // -------------------------
    // Analysis Method
    // -------------------------
    public function analysis()
    {
        $applications = CdfScholarship::all();

        $statusCounts = $applications->groupBy('status')->map->count();
        $genderCounts = $applications->groupBy('gender')->map->count();

        return view('admin.cdf.analysis', compact('statusCounts', 'genderCounts'));
    }
}
