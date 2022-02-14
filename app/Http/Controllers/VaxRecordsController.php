<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaxRecords;
use App\Models\VaxHistory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class VaxRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vaxrecords = VaxRecords::where([
            ['ownername', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('ownername', 'LIKE', '%'.$search.'%')
                    ->orWhere('petname', 'LIKE', '%'.$search.'%')
                    ->orWhere('species', 'LIKE', '%'.$search.'%')
                    ->orWhere('breed', 'LIKE', '%'.$search.'%')
                    ->orWhere('owneremail', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("id", "ASC")
            ->paginate(9999);
        return view('vaxrecords.index', ['vaxrecords' => $vaxrecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaxrecords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ownername' => 'required',
            'petname' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'owneremail' => 'required',
        ]);
        
        $vaxrecords = new VaxRecords;
        $vaxrecords->ownername = $request->ownername;
        $vaxrecords->petname = $request->petname;
        $vaxrecords->species = $request->species;
        $vaxrecords->breed = $request->breed;
        $vaxrecords->owneremail = $request->owneremail;
        $vaxrecords->recid = Hash::make($request->petname.$vaxrecords->id);
        $vaxrecords->save();

        return redirect('/vaxrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaxrecords = VaxRecords::findOrFail($id);
        $history = VaxHistory::all()->where('recid', $vaxrecords->recid);
        return view('vaxrecords.show', ['vaxrecords' => $vaxrecords, 'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaxrecords = VaxRecords::findOrFail($id);
        return view('vaxrecords.edit', ['vaxrecords' => $vaxrecords]);
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
        $this->validate($request, [
            'ownername' => 'required',
            'petname' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'owneremail' => 'required',
        ]);

        $vaxrecords = VaxRecords::find($id);
        $vaxrecords->ownername=$request->ownername;
        $vaxrecords->petname=$request->petname;
        $vaxrecords->breed=$request->breed;
        $vaxrecords->species = $request->species;
        $vaxrecords->recid = $request->recid;
        $vaxrecords->owneremail = $request->owneremail;
        $vaxrecords->save();

        return redirect('vaxrecords');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VaxRecords::destroy($id);
        return redirect('vaxrecords');
    }

    /**
     * Hide the specified resource from view
     */
    public function archive($id)
    {
        $vaxrecords = VaxRecords::find($id);
        $vaxrecords->status = 'archive';
        $vaxrecords->save();

        return redirect('vaxrecords');
    }
}
