<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurgicalRecords;
use App\Models\SurgicalHistory;

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
        
        $history = new SurgicalHistory;
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
