<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroomingRecords;
use App\Models\GroomingHistory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class GroomingRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groomingrecords = GroomingRecords::where([
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
        return view('groomingrecords.index', ['groomingrecords' => $groomingrecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groomingrecords.create');
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
            'breed' => 'required',
        ]);

        $groomingrecords = new GroomingRecords;
        $groomingrecords->ownername=$request->ownername;
        $groomingrecords->petname=$request->petname;
        $groomingrecords->breed=$request->breed;
        $groomingrecords->species=$request->species;
        $groomingrecords->recid= Hash::make($request->petname.$groomingrecords->id);
        $groomingrecords->save();

        return redirect('/groomingrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groomingrecords = GroomingRecords::findOrFail($id);
        $history = GroomingHistory::all()->where('recid', $groomingrecords->recid);
        return view('groomingrecords.show', ['groomingrecords' => $groomingrecords, 'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groomingrecords = GroomingRecords::findOrFail($id);
        return view('groomingrecords.edit', ['groomingrecords' => $groomingrecords]);
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
            'breed' => 'required',
        ]);

        $groomingrecords = GroomingRecords::find($id);
        $groomingrecords->ownername=$request->ownername;
        $groomingrecords->petname=$request->petname;
        $groomingrecords->breed=$request->breed;
        $groomingrecords->species=$request->species;
        $groomingrecords->save();

        return redirect('groomingrecords')->with('success', 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GroomingRecords::destroy($id);
        return redirect('groomingrecords');
    }

    /**
     * Hide the specified resource from view
     */
    public function archive($id)
    {
        $groomingrecords = GroomingRecords::find($id);
        $groomingrecords->status = 'archive';
        $groomingrecords->save();

        return redirect('groomingrecords');
    }
}