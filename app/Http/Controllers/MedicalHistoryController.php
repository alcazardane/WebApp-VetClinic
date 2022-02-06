<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\HealthRecords;
use Illuminate\Support\Facades\Hash;
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

        $history = new MedicalHistory;
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
