<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationRecords;
use App\Models\ConsultationHistory;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;
use DB;

class ConsultationHistoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'procedure' => 'required',
            'weight' => 'required|numeric',
            'temp' => 'required|numeric',
            'vet' => 'required',
        ]);

        $history = ConsultationHistory::create([
            'date' => $request->date,
            'procedure' => $request->procedure,
            'weight' => $request->weight,
            'temp' => $request->temp,
            'vet' => $request->vet,
            'recid' => $request->recid,
        ]);

        $report = Report::updateOrCreate(
            ['reporteddate' => $request->date],
            ['consultation' => DB::raw('consultation + 1')],
        );

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'procedure' => 'required',
            'weight' => 'required|numeric',
            'temp' => 'required|numeric',
            'vet' => 'required',
        ]);
        
        $history = ConsultationHistory::find($id);
        $history->date = $request->date;
        $history->procedure = $request->procedure;
        $history->weight = $request->weight;
        $history->temp = $request->temp;
        $history->vet = $request->vet;
        $history->recid = $request->recid;
        $history->save();

        return back();
    }

    public function destroy($id)
    {
        ConsultationHistory::destroy($id);
        return back();
    }
}
