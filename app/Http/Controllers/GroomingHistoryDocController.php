<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroomingHistory;
use App\Models\GroomingRecords;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use Spatie\Activitylog\Models\Activity;
use Auth;

class GroomingHistoryDocController extends Controller
{
    public function store(Request $request, $id)
    {
        $record = GroomingRecords::findorFail($id);
        $history = GroomingHistory::all()->where('recid', $record->recid);
        $templateProcessor = new TemplateProcessor('grooming_template.docx');

        $templateProcessor->setValue('ownername', $record->ownername);
        $templateProcessor->setValue('petname', $record->petname);
        $templateProcessor->setValue('breed', $record->breed);

        $templateProcessor->cloneRow('recordid', $history->count());
        
        $date = array();
        $service = array();
        foreach ($history as $history) {
            $date[] = $history->date;
            $service[] = $history->services;
        }

        for ($i=1; $i <= $history->count(); $i++) { 
            $templateProcessor->setValue('recordid#'.$i, $i);
            $templateProcessor->setValue('date#'.$i, $date[$i-1] ?? "");
            $templateProcessor->setValue('services#'.$i, $service[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs($record->ownername.'_'.$record->petname.'-grooming'.'.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($record->ownername.'_'.$record->petname.'-grooming'.'.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path($record->ownername.'_'.$record->petname.'-grooming'.'-pdfForm'.'.pdf'));

        activity()
            ->causedBy(Auth::user()->id)
            ->performedOn($history)
            ->event('download')
            ->log('Grooming History has been downloaded');

        return response()->download(public_path($record->ownername.'_'.$record->petname.'-grooming'.'-pdfForm'.'.pdf'));
    }

    public function count(){
        return count($this->items);
    }

    public function destroy($id)
    {
        GroomingHistory::destroy($id);
        return back();
    }
}
