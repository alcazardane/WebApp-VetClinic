<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VetStaff;

class VetStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vetstaff = VetStaff::where([
            ['vetstaffid', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('firstname', 'LIKE', '%'.$search.'%')
                    ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                    ->orWhere('sex', 'LIKE', '%'.$search.'%')
                    ->orWhere('address', 'LIKE', '%'.$search.'%')
                    ->orWhere('contactnum', 'LIKE', '%'.$search.'%')
                    ->orWhere('vetstaffid', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orWhere('desc', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("id", "ASC")
            ->paginate(9999);
        return view('vetstaff.index', ['vetstaff' => $vetstaff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vetstaff.create');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'contactnum' => 'required|numeric',
            'desc' => 'required',
            'vetstaffid' => 'required',
            'email' => 'required',
        ]);

        $vetstaff = new VetStaff;
        $vetstaff->firstname = $request->firstname;
        $vetstaff->lastname = $request->lastname;
        $vetstaff->sex = $request->sex;
        $vetstaff->address = $request->address;
        $vetstaff->contactnum = $request->contactnum;
        $vetstaff->desc = $request->desc;
        $vetstaff->vetstaffid = $request->vetstaffid;
        $vetstaff->email = $request->email;
        $vetstaff->save();

        return redirect('vetstaff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vetstaff = VetStaff::findorFail($id);
        return view('vetstaff.show', ['vetstaff' => $vetstaff]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vetstaff = VetStaff::findorFail($id);
        return view('vetstaff.edit', ['vetstaff' => $vetstaff]);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'contactnum' => 'required|numeric',
            'desc' => 'required',
            'vetstaffid' => 'required',
        ]);

        $vetstaff = VetStaff::find($id);
        $vetstaff->firstname = $request->firstname;
        $vetstaff->lastname = $request->lastname;
        $vetstaff->sex = $request->sex;
        $vetstaff->address = $request->address;
        $vetstaff->contactnum = $request->contactnum;
        $vetstaff->desc = $request->desc;
        $vetstaff->save();

        return redirect('vetstaff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VetStaff::destroy($id);
        return redirect('vetstaff');
    }

    /**
     * Hide the specified resource from view
     */
    public function archive($id)
    {
        $vetstaff = VetStaff::find($id);
        $vetstaff->status = 'archive';
        $vetstaff->save();

        return redirect('vetstaff');
    }
}
