<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Auth;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $report = Report::where([
            ['reporteddate', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('reporteddate', 'LIKE', '%'.$search.'%')
                    ->orWhere('appointment', 'LIKE', '%'.$search.'%')
                    ->orWhere('health', 'LIKE', '%'.$search.'%')
                    ->orWhere('vaccine', 'LIKE', '%'.$search.'%')
                    ->orWhere('grooming', 'LIKE', '%'.$search.'%')
                    ->orWhere('consultation', 'LIKE', '%'.$search.'%')
                    ->orWhere('surgical', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("reporteddate", "ASC")
            ->paginate(9999);

        return view('statistics.index', ['report' => $report]);
    }

    public function downloadStats(Request $request)
    {

        if ($request->reporttype == "daily") {
            $this->downloadDaily();
            activity()
                ->causedBy(Auth::user()->id)
                ->event('download')
                ->log('Report has been downloaded');
            return response()->download(public_path('Daily_report_-pdfForm'.'.pdf'));
        }

        else if ($request->reporttype == "monthly") {
            $this->downloadMonthly();
            activity()
                ->causedBy(Auth::user()->id)
                ->event('download')
                ->log('Report has been downloaded');
            return response()->download(public_path('Monthly_report_-pdfForm'.'.pdf'));
        }

        else
        {
            $this->downloadAnnual();
            activity()
                ->causedBy(Auth::user()->id)
                ->event('download')
                ->log('Report has been downloaded');

        return response()->download(public_path('Annual_report_-pdfForm'.'.pdf'));
        }
    }

    private function downloadDaily()
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
        
        $templateProcessor->saveAs('Daily_report_.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('Daily_report_.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('Daily_report_-pdfForm'.'.pdf'));
    }

    private function downloadMonthly()
    {

        $report = Report::all();

        $reprep = Report::select(
            DB::raw('sum(appointment) as `appointment`'),
            DB::raw('sum(health) as `health`'),
            DB::raw('sum(vaccine) as `vaccine`'),
            DB::raw('sum(grooming) as `grooming`'),
            DB::raw('sum(consultation) as `consultation`'),
            DB::raw('sum(surgical) as `surgical`'),
            DB::raw("DATE_FORMAT(reporteddate,'%M %Y') as repdate"),
            DB::raw('max(reporteddate) as repDate'))
           ->where("reporteddate", ">=", \Carbon\Carbon::now()->subMonths(12))
           ->orderBy('repDate', 'desc')
           ->groupBy('repdate')
           ->get();

        $templateProcessor = new TemplateProcessor('report_template.docx');

        $templateProcessor->setValue('downloadeddate', Carbon::now());

        $templateProcessor->cloneRow('reportid', $reprep->count());
        
        $monthyear = array();
        $appointment = array();
        $health = array();
        $vaccine = array();
        $grooming = array();
        $consultation = array();
        $surgical = array();

        //date('F Y', strtotime($report->reporteddate))
        //$appcount = Report::where('reporteddate', '')

        foreach ($reprep as $reprep) {
            $monthyear[] = $reprep->repdate;
            $appointment[] = $reprep->appointment;
            $health[] = $reprep->health;
            $vaccine[] = $reprep->vaccine;
            $grooming[] = $reprep->grooming;
            $consultation[] = $reprep->consultation;
            $surgical[] = $reprep->surgical;
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
        
        $templateProcessor->saveAs('Monthly_report_.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('Monthly_report_.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('Monthly_report_-pdfForm'.'.pdf'));
    }

    private function downloadAnnual()
    {

        $reprep = Report::select(
            DB::raw('sum(appointment) as `appointment`'),
            DB::raw('sum(health) as `health`'),
            DB::raw('sum(vaccine) as `vaccine`'),
            DB::raw('sum(grooming) as `grooming`'),
            DB::raw('sum(consultation) as `consultation`'),
            DB::raw('sum(surgical) as `surgical`'),
            DB::raw("DATE_FORMAT(reporteddate,'%Y') as repdate"),
            DB::raw('max(reporteddate) as repDate'))
           ->where("repdate", ">=", \Carbon\Carbon::now('Y'))
           ->orderBy('repDate', 'desc')
           ->groupBy('repdate')
           ->get();

        $templateProcessor = new TemplateProcessor('report_template.docx');

        $templateProcessor->setValue('downloadeddate', Carbon::now());

        $templateProcessor->cloneRow('reportid', $reprep->count());
        
        $date = array();
        $appointment = array();
        $health = array();
        $vaccine = array();
        $grooming = array();
        $consultation = array();
        $surgical = array();

        foreach ($reprep as $reprep) {
            $monthyear[] = $reprep->repdate;
            $appointment[] = $reprep->appointment;
            $health[] = $reprep->health;
            $vaccine[] = $reprep->vaccine;
            $grooming[] = $reprep->grooming;
            $consultation[] = $reprep->consultation;
            $surgical[] = $reprep->surgical;
        }

        for ($i=1; $i <= $reprep->count(); $i++) { 
            $templateProcessor->setValue('reportid#'.$i, $i);
            $templateProcessor->setValue('appointment#'.$i, $appointment[$i-1] ?? "");
            $templateProcessor->setValue('health#'.$i, $health[$i-1] ?? "");
            $templateProcessor->setValue('vaccine#'.$i, $vaccine[$i-1] ?? "");
            $templateProcessor->setValue('grooming#'.$i, $grooming[$i-1] ?? "");
            $templateProcessor->setValue('consultation#'.$i, $consultation[$i-1] ?? "");
            $templateProcessor->setValue('surgical#'.$i, $surgical[$i-1] ?? "");
            $templateProcessor->setValue('monthyear#'.$i, $monthyear[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs('Annual_report_.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('Annual_report_.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('Annual_report_-pdfForm.pdf'));
    }
}
