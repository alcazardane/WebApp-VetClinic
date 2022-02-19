<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationRecords;
use App\Models\ConsultationHistory;
use Illuminate\Support\Facades\Hash;

class ConsultationRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = ConsultationRecords::where([
            ['ownername', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('ownername', 'LIKE', '%'.$search.'%')
                    ->orWhere('petname', 'LIKE', '%'.$search.'%')
                    ->orWhere('species', 'LIKE', '%'.$search.'%')
                    ->orWhere('breed', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("id", "ASC")
            ->paginate(9999);
            
        return view('consultationrecords.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultationrecords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'ownername' => 'required',
            'petname' => 'required',
            'species' => 'required',
            'breed' => 'required',
        ]);

        $records = ConsultationRecords::create([
            'ownername' => $request->ownername,
            'petname' => $request->petname,
            'species' => $request->species,
            'breed' => $request->breed,
            'recid' => uniqid('VTKZCONREC', true),
        ]);

        return redirect('consultationrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $records = ConsultationRecords::findorFail($id);
        $history = ConsultationHistory::all()->where('recid', $records->recid);
        return view('consultationrecords.show', ['history' => $history, 'records' => $records]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $records = ConsultationRecords::findorFail($id);
        return view('consultationrecords.edit', ['records' => $records]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'ownername' => 'required',
            'petname' => 'required',
            'species' => 'required',
            'breed' => 'required',
        ]);

        $records = ConsultationRecords::find($id);
        $records->ownername = $request->ownername;
        $records->petname = $request->petname;
        $records->species = $request->species;
        $records->breed = $request->breed;
        $records->recid = $request->recid;
        $records->save();

        return redirect('consultationrecords');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ConsultationRecords::destroy($id);
        return back();
    }

    /**
     * Hide the specified resource from view
     */
    public function archive($id)
    {
        $records = ConsultationRecords::find($id);
        $records->status = 'archive';
        $records->save();

        return redirect('consultationrecords');
    }
}
