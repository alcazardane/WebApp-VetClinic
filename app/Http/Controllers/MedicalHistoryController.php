<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\HealthRecords;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;
use DB;

class MedicalHistoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'weight' => 'required|numeric',
            'temp' => 'required|numeric',
            'checkup' => 'required',
            'treatment' => 'required',
            'vxmx' => 'required',
        ]);

        $history = MedicalHistory::create([
            'date' => $request->date,
            'weight' => $request->weight,
            'temp' => $request->temp,
            'checkup' => $request->checkup,
            'treatment' => $request->treatment,
            'vxmx' => $request->vxmx,
            'recid' => $request->recid,
        ]);

        $report = Report::updateOrCreate(
            ['reporteddate' => $request->date],
            ['health' => DB::raw('health + 1')],
        );

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'weight' => 'required|numeric',
            'temp' => 'required|numeric',
            'checkup' => 'required',
            'treatment' => 'required',
            'vxmx' => 'required',
        ]);
        
        $history = MedicalHistory::find($id);
        $history->date = $request->date;
        $history->weight = $request->weight;
        $history->temp = $request->temp;
        $history->checkup = $request->checkup;
        $history->Treatment = $request->treatment;
        $history->vxmx = $request->vxmx;
        $history->recid = $request->recid;
        $history->save();

        return back();
    }

    public function destroy($id)
    {
        MedicalHistory::destroy($id);
        return back();
    }
}
