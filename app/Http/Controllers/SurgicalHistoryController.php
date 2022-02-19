<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurgicalRecords;
use App\Models\SurgicalHistory;
use DB;

class SurgicalHistoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'datetime' => 'required',
            'weight' => 'required',
            'procedure' => 'required',
            'pam' => 'required',
            'aa' => 'required',
            'sas' => 'required',
            'techinit' => 'required',
            'assinit' => 'required',
            'vetinit' => 'required',
            'lengthsurgery' => 'required',
            'specimens' => 'required',
            'comments' => 'required',
        ]);
        
        $history = SurgicalHistory::create([
            'datetime' => $request->datetime,
            'weight' => $request->weight,
            'procedure' => $request->procedure,
            'pam' => $request->pam,
            'aa' => $request->aa,
            'sas' => $request->sas,
            'techinit' => $request->techinit,
            'assinit' => $request->assinit,
            'vetinit' => $request->vetinit,
            'lengthsurgery' => $request->lengthsurgery,
            'specimens' => $request->specimens,
            'comments' => $request->comments,
            'recid' => $request->recid,
        ]);

        $report = Report::updateOrCreate(
            ['reporteddate' => Carbon::parse($request->datetime)->format('Y-m-d')],
            ['surgical' => DB::raw('surgical + 1')],
        );

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'datetime' => 'required',
            'weight' => 'required',
            'procedure' => 'required',
            'pam' => 'required',
            'aa' => 'required',
            'sas' => 'required',
            'techinit' => 'required',
            'assinit' => 'required',
            'vetinit' => 'required',
            'lengthsurgery' => 'required',
            'specimens' => 'required',
            'comments' => 'required',
        ]);
        
        $history = SurgicalHistory::find($id);
        $history->datetime = $request->datetime;
        $history->weight = $request->weight;
        $history->procedure = $request->procedure;
        $history->pam = $request->pam;
        $history->aa = $request->aa;
        $history->sas = $request->sas;
        $history->techinit = $request->techinit;
        $history->assinit = $request->assinit;
        $history->vetinit = $request->vetinit;
        $history->lengthsurgery = $request->lengthsurgery;
        $history->specimens = $request->specimens;
        $history->comments = $request->comments;
        $history->recid = $request->recid;
        $history->save();

        return back();
    }

    public function destroy($id)
    {
        SurgicalHistory::destroy($id);
        return back();
    }
}
