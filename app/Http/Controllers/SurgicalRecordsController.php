<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SurgicalRecords;
use App\Models\SurgicalHistory;

class SurgicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = SurgicalRecords::where([
            ['ownername', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('ownername', 'LIKE', '%'.$search.'%')
                    ->orWhere('petname', 'LIKE', '%'.$search.'%')
                    ->orWhere('species', 'LIKE', '%'.$search.'%')
                    ->orWhere('breed', 'LIKE', '%'.$search.'%')
                    ->orWhere('gender', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("id", "ASC")
            ->paginate(9999);
        return view('surgicalrecords.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surgicalrecords.create');
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
            'gender' => 'required',
        ]);
        
        $records = new SurgicalRecords;
        $records->ownername = $request->ownername;
        $records->petname = $request->petname;
        $records->species = $request->species;
        $records->breed = $request->breed;
        $records->gender = $request->gender;
        $records->recid = Hash::make($request->petname.$records->id);
        $records->save();

        return redirect('surgicalrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $records = SurgicalRecords::findorFail($id);
        $history = SurgicalHistory::all()->where('recid', $records->recid);
        return view('surgicalrecords.show', ['history' => $history, 'records' => $records]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $records = SurgicalRecords::findorFail($id);
        return view('surgicalrecords.edit', ['records' => $records]);
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
            'gender' => 'required',
        ]);
        
        $records = SurgicalRecords::find($id);
        $records->ownername = $request->ownername;
        $records->petname = $request->petname;
        $records->species = $request->species;
        $records->breed = $request->breed;
        $records->recid = $request->recid;
        $records->save();

        return redirect('surgicalrecords');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SurgicalRecords::destroy($id);
        return redirect('surgicalrecords');
    }
}
