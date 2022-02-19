<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurgicalRecords;
use App\Models\SurgicalHistory;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use Spatie\Activitylog\Models\Activity;
use Auth;

class SurgicalHistoryDocController extends Controller
{
    public function store(Request $request, $id)
    {
        $record = SurgicalRecords::findorFail($id);
        $history = SurgicalHistory::all()->where('recid', $record->recid);

        $templateProcessor = new TemplateProcessor('surgery_template.docx');

        $templateProcessor->setValue('ownername', $record->ownername);
        $templateProcessor->setValue('petname', $record->petname);
        $templateProcessor->setValue('species', $record->species);
        $templateProcessor->setValue('breed', $record->breed);
        $templateProcessor->setValue('gender', $record->gender);

        $templateProcessor->cloneRow('recordid', $history->count());
        
        $datetime = array();
        $weight = array();
        $procedure = array();
        $pam = array();
        $aa = array();
        $sas = array();
        $techinit = array();
        $assinit = array();
        $vetinit = array();
        $lengthsurgery = array();
        $specimens = array();
        $comments = array();
        foreach ($history as $history) {
            $datetime[] = $history->datetime;
            $weight[] = $history->weight;
            $procedure[] = $history->procedure;
            $pam[] = $history->pam;
            $aa[] = $history->aa;
            $sas[] = $history->sas;
            $techinit[] = $history->techinit;
            $assinit[] = $history->assinit;
            $vetinit[] = $history->vetinit;
            $lengthsurgery[] = $history->lengthsurgery;
            $specimens[] = $history->specimens;
            $comments[] = $history->comments;
        }

        for ($i=1; $i <= $history->count(); $i++) { 
            $templateProcessor->setValue('recordid#'.$i, $i);
            $templateProcessor->setValue('datetime#'.$i, $datetime[$i-1] ?? "");
            $templateProcessor->setValue('weight#'.$i, $weight[$i-1] ?? "");
            $templateProcessor->setValue('procedure#'.$i, $procedure[$i-1] ?? "");
            $templateProcessor->setValue('pam#'.$i, $pam[$i-1] ?? "");
            $templateProcessor->setValue('aa#'.$i, $aa[$i-1] ?? "");
            $templateProcessor->setValue('sas#'.$i, $sas[$i-1] ?? "");
            $templateProcessor->setValue('techinit#'.$i, $techinit[$i-1] ?? "");
            $templateProcessor->setValue('assinit#'.$i, $assinit[$i-1] ?? "");
            $templateProcessor->setValue('vet#'.$i, $vetinit[$i-1] ?? "");
            $templateProcessor->setValue('lengthsurgery#'.$i, $lengthsurgery[$i-1] ?? "");
            $templateProcessor->setValue('specimens#'.$i, $specimens[$i-1] ?? "");
            $templateProcessor->setValue('comments#'.$i, $comments[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs($record->ownername.'_'.$record->petname.'-surgical'.'.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($record->ownername.'_'.$record->petname.'-surgical'.'.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path($record->ownername.'_'.$record->petname.'-surgical'.'-pdfForm'.'.pdf'));

        activity('HISTORY_DL')
            ->causedBy(Auth::user()->id)
            ->performedOn($history)
            ->event('download')
            ->log('Surgical History has been downloaded');

        return response()->download(public_path($record->ownername.'_'.$record->petname.'-surgical'.'-pdfForm'.'.pdf'));
    }

    public function count(){
        return count($this->items);
    }

    public function destroy($id)
    {
        SurgicalHistory::destroy($id);
        return back();
    }
}
