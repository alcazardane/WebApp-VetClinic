<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecords;
use App\Models\MedicalHistory;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use Spatie\Activitylog\Models\Activity;
use Auth;

class DocumentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $record = HealthRecords::findorFail($id);
        $history = MedicalHistory::all()->where('recid', $record->recid);
        $templateProcessor = new TemplateProcessor('template.docx');

        $templateProcessor->setValue('ownername', $record->ownername);
        $templateProcessor->setValue('petname', $record->petname);
        $templateProcessor->setValue('address', $record->address);
        $templateProcessor->setValue('birthday', $record->birthday);
        $templateProcessor->setValue('species', $record->species);
        $templateProcessor->setValue('breed', $record->breed);
        $templateProcessor->setValue('contactnum', $record->contactnum);

        $templateProcessor->cloneRow('recordid', $history->count());
        
        $date = array();
        $temp = array();
        $checkup = array();
        $treatment = array();
        $vxmx = array();
        $weight = array();
        foreach ($history as $history) {
            $date[] = $history->date;
            $temp[] = $history->temp;
            $checkup[] = $history->checkup;
            $treatment[] = $history->Treatment;
            $vxmx[] = $history->vxmx;
            $weight[] = $history->weight;
        }

        for ($i=1; $i <= $history->count(); $i++) { 
            $templateProcessor->setValue('recordid#'.$i, $i);
            $templateProcessor->setValue('date#'.$i, $date[$i-1] ?? "");
            $templateProcessor->setValue('temp#'.$i, $temp[$i-1] ?? "");
            $templateProcessor->setValue('checkup#'.$i, $checkup[$i-1] ?? "");
            $templateProcessor->setValue('Treatment#'.$i, $treatment[$i-1] ?? "");
            $templateProcessor->setValue('vxmx#'.$i, $vxmx[$i-1] ?? "");
            $templateProcessor->setValue('weight#'.$i, $weight[$i-1] ?? "");
        }
        
        $templateProcessor->saveAs($record->ownername.'_'.$record->petname.'.docx');
        
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
         
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path($record->ownername.'_'.$record->petname.'.docx'));
    
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path($record->ownername.'_'.$record->petname.'-pdfForm'.'.pdf'));

        activity()
            ->causedBy(Auth::user()->id)
            ->performedOn($history)
            ->event('download')
            ->log('Health History has been downloaded');

        return response()->download(public_path($record->ownername.'_'.$record->petname.'-pdfForm'.'.pdf'));
    }

    public function count(){
        return count($this->items);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicalHistory::destroy($id);
        return back();
    }
}
