<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaxRecords;
use App\Models\VaxHistory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class VaxHistoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'vaxdesc' => 'required',
            'vet' => 'required',
            'status' => 'required',
            'date' => 'required',
            'fdate' => 'required',
            'owneremail' => 'required',
            'ownername' => 'required',
        ]);

        $history = new VaxHistory;
        $history->vaxdesc = $request->vaxdesc;
        $history->vet = $request->vet;
        $history->status = $request->status;
        $history->date = $request->date;
        $history->fdate = $request->fdate;
        $history->recid = $request->recid;
        $history->owneremail = $request->owneremail;
        $history->ownername = $request->ownername;
        $history->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'vaxdesc' => 'required',
            'vet' => 'required',
            'status' => 'required',
            'date' => 'required',
            'fdate' => 'required',
        ]);

        $history = VaxHistory::find($id);
        $history->vaxdesc = $request->vaxdesc;
        $history->vet = $request->vet;
        $history->status = $request->status;
        $history->date = $request->date;
        $history->fdate = $request->fdate;
        $history->recid = $request->recid;
        $history->save();

        return back();
    }

    public function destroy($id)
    {
        VaxHistory::destroy($id);
        return back();
    }
}
