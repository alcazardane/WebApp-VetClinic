<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecords;
use App\Models\MedicalHistory;
use DB;
use Illuminate\Support\Facades\Hash;

class HealthRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $healthrecords = HealthRecords::where([
            ['ownername', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('ownername', 'LIKE', '%'.$search.'%')
                    ->orWhere('petname', 'LIKE', '%'.$search.'%')
                    ->orWhere('address', 'LIKE', '%'.$search.'%')
                    ->orWhere('birthday', 'LIKE', '%'.$search.'%')
                    ->orWhere('species', 'LIKE', '%'.$search.'%')
                    ->orWhere('breed', 'LIKE', '%'.$search.'%')
                    ->orWhere('contactnum', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("id", "ASC")
            ->paginate(9999);
        return view('healthrecords.index', ['healthrecords' => $healthrecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('healthrecords.create');
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
            'address' => 'required',
            'birthday' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'contactnum' => 'required|numeric',
        ]);

        $healthrecords = new HealthRecords;
        $healthrecords->ownername=$request->ownername;
        $healthrecords->petname=$request->petname;
        $healthrecords->address=$request->address;
        $healthrecords->birthday=$request->birthday;
        $healthrecords->species=$request->species;
        $healthrecords->breed=$request->breed;
        $healthrecords->contactnum=$request->contactnum;
        $healthrecords->recid=Hash::make($request->petname.$healthrecords->id);
        $healthrecords->save();

        return redirect('/healthrecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $healthrecords = HealthRecords::findorFail($id);
        $history = MedicalHistory::all()->where('recid', $healthrecords->recid);
        return view('healthrecords.show', ['history' => $history, 'healthrecords' => $healthrecords]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $healthrecords = HealthRecords::findOrFail($id);
        return view('healthrecords.edit', ['healthrecords' => $healthrecords]);
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
            'address' => 'required',
            'birthday' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'contactnum' => 'required|numeric',
        ]);

        $healthrecords = HealthRecords::find($id);
        $healthrecords->ownername=$request->ownername;
        $healthrecords->petname=$request->petname;
        $healthrecords->address=$request->address;
        $healthrecords->birthday=$request->birthday;
        $healthrecords->species=$request->species;
        $healthrecords->breed=$request->breed;
        $healthrecords->contactnum=$request->contactnum;
        $healthrecords->save();

        return redirect('healthrecords');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HealthRecords::destroy($id);
        return redirect('/healthrecords');
    }
}
