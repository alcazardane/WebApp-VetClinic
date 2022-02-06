<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationRecords;
use App\Models\ConsultationHistory;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

class ConsultationHistoryDocController extends Controller
{
    public function store(Request $request, $id)
    {
        $record = ConsultationRecords::findorFail($id);
        $history = ConsultationHistory::all()->where('recid', $record->recid);

        $templateProcessor = new TemplateProcessor('consultation_template.docx');

        $templateProcessor->setValue('ownername', $record->ownername);
        $templateProcessor->setValue('petname', $record->petname);
        $templateProcessor->setValue('species', $record->species);
        $templateProcessor->setValue('breed', $record->breed);

        $templateProcessor->cloneRow('recordid', $history->count());
        
        $date = array();
        $procedure = array();
        $weight = array();
        $temp = array();
        $vet = array();
        foreach ($history as $history) {
            $date[] = $history->date;
            $procedure[] = $history->procedure;
            $weight[] = $history->weight;
            $temp[] = $history->temp;
            $vet[] = $history->vet;
        }

        for ($i=1; $i <= $history->count(); $i++) { 
            $templateProcessor->setValue('recordid#'.$i, $i);
            $templateProcessor->setValue('date#'.$i, $date[$i-1] ?? "");
            $templateProcessor->setValue('procedure#'.$i, $procedure[$i-1] ?? "");
            $templateProcessor->setValue('weight#'.$i, $weight[$i-1] ?? "");
            $templateProcessor->setValue('temp#'.$i, $temp[$i-1] ?? "");
            $templateProcessor->setValue('vet#'.$i, $vet[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs($record->ownername.'_'.$record->petname.'-consultation'.'.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($record->ownername.'_'.$record->petname.'-consultation'.'.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path($record->ownername.'_'.$record->petname.'-consultation'.'-pdfForm'.'.pdf'));

        return response()->download(public_path($record->ownername.'_'.$record->petname.'-consultation'.'-pdfForm'.'.pdf'));
    }

    public function count(){
        return count($this->items);
    }

    public function destroy($id)
    {
        ConsultationHistory::destroy($id);
        return back();
    }
}
