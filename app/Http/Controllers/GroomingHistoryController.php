<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroomingRecords;
use App\Models\GroomingHistory;
use App\Models\Report;
use DB;

class GroomingHistoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'service' => 'required',
        ]);

        $history = GroomingHistory::create([
            'date' => $request->date,
            'services' => implode(', ', $request->service),
            'recid' => $request->recid,
        ]);

        $report = Report::updateOrCreate(
            ['reporteddate' => $request->date],
            ['grooming' => DB::raw('grooming + 1')],
        );

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date' => 'required',
            'service' => 'required',
        ]);
        
        $history = GroomingHistory::find($id);
        $history->date = $request->date;
        $services = implode(', ', $request->service);
        $history->services = $services;
        $history->recid = $request->recid;
        $history->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GroomingHistory::destroy($id);
        return back();
    }
}
