<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaxRecords;
use App\Models\VaxHistory;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

class VaxHistoryDocController extends Controller
{
    public function store(Request $request, $id)
    {
        $record = VaxRecords::findorFail($id);
        $history = VaxHistory::all()->where('recid', $record->recid);

        $templateProcessor = new TemplateProcessor('vaccine_template.docx');

        $templateProcessor->setValue('ownername', $record->ownername);
        $templateProcessor->setValue('petname', $record->petname);
        $templateProcessor->setValue('breed', $record->breed);
        $templateProcessor->setValue('species', $record->species);

        $templateProcessor->cloneRow('recordid', $history->count());
        
        $vaxdesc = array();
        $vet = array();
        $date = array();
        $fdate = array();
        $status = array();
        foreach ($history as $history) {
            $vaxdesc[] = $history->vaxdesc;
            $vet[] = $history->vet;
            $date[] = $history->date;
            $fdate[] = $history->fdate;
            $status[] = $history->status;
        }

        for ($i=1; $i <= $history->count(); $i++) { 
            $templateProcessor->setValue('recordid#'.$i, $i);
            $templateProcessor->setValue('vaxdesc#'.$i, $vaxdesc[$i-1] ?? "");
            $templateProcessor->setValue('vet#'.$i, $vet[$i-1] ?? "");
            $templateProcessor->setValue('date#'.$i, $date[$i-1] ?? "");
            $templateProcessor->setValue('fdate#'.$i, $fdate[$i-1] ?? "");
            $templateProcessor->setValue('status#'.$i, $status[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs($record->ownername.'_'.$record->petname.'-vaccine'.'.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($record->ownername.'_'.$record->petname.'-vaccine'.'.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path($record->ownername.'_'.$record->petname.'-vaccine'.'-pdfForm'.'.pdf'));

        return response()->download(public_path($record->ownername.'_'.$record->petname.'-vaccine'.'-pdfForm'.'.pdf'));
    }

    public function count()
    {
        return count($this->items);
    }

    public function destory($id)
    {
        VaxHistory::destory($id);
        return back();
    }
}
