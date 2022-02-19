<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Auth;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $report = Report::where([
            ['reporteddate', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('reporteddate', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("id", "ASC")
            ->paginate(9999);

        return view('statistics.index', ['report' => $report]);
    }

    public function downloadStats()
    {
        $report = Report::all();

        $templateProcessor = new TemplateProcessor('report_template.docx');

        $templateProcessor->setValue('downloadeddate', Carbon::now());

        $templateProcessor->cloneRow('reportid', $report->count());
        
        $date = array();
        $appointment = array();
        $health = array();
        $vaccine = array();
        $grooming = array();
        $consultation = array();
        $surgical = array();

        foreach ($report as $report) {
            $monthyear[] = date('F j, Y', strtotime($report->reporteddate));
            $appointment[] = $report->appointment;
            $health[] = $report->health;
            $vaccine[] = $report->vaccine;
            $grooming[] = $report->grooming;
            $consultation[] = $report->consultation;
            $surgical[] = $report->surgical;
        }

        for ($i=1; $i <= $report->count(); $i++) { 
            $templateProcessor->setValue('reportid#'.$i, $i);
            $templateProcessor->setValue('appointment#'.$i, $appointment[$i-1] ?? "");
            $templateProcessor->setValue('health#'.$i, $health[$i-1] ?? "");
            $templateProcessor->setValue('vaccine#'.$i, $vaccine[$i-1] ?? "");
            $templateProcessor->setValue('grooming#'.$i, $grooming[$i-1] ?? "");
            $templateProcessor->setValue('consultation#'.$i, $consultation[$i-1] ?? "");
            $templateProcessor->setValue('surgical#'.$i, $surgical[$i-1] ?? "");
            $templateProcessor->setValue('monthyear#'.$i, $monthyear[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs('Monthly_report_'.$report->reporteddate.'.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('Monthly_report_'.$report->reporteddate.'.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('Monthly_report_'.$report->reporteddate.'-pdfForm'.'.pdf'));

        activity()
            ->causedBy(Auth::user()->id)
            ->performedOn($report)
            ->event('download')
            ->log('Report has been downloaded');

        return response()->download(public_path('Monthly_report_'.$report->reporteddate.'-pdfForm'.'.pdf'));
    }
}
