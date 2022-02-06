<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appointments = Appointment::where([
            ['email', '!=', Null],
            [function($query) use ($request) {
                if(($search = $request->search)) {
                    $query->orWhere('firstname', 'LIKE', '%'.$search.'%')
                    ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                    ->orWhere('contactnum', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orWhere('datetime', 'LIKE', '%'.$search.'%')
                    ->orWhere('purpose', 'LIKE', '%'.$search.'%')
                    ->get();
                }
            }]
        ])
            ->orderBy("datetime", "ASC")
            ->paginate(9999);
        return view('appointments.index', ['appointments' => $appointments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
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
            'contactnum' => 'required|numeric',
            'email' => 'required|email',
            'datetime' => 'required',
            'purpose' => 'required',
        ]);

        $appointment = new Appointment;
        
        $appointment->firstname = $request->firstname;
        $appointment->lastname = $request->lastname;
        $appointment->contactnum = $request->contactnum;
        $appointment->email = $request->email;
        $appointment->datetime = $request->datetime;
        $appointment->purpose = $request->purpose;
        $appid = $appointment->id;
        $appidformat = sprintf('APP%s', $appid);
        $appointment->appointmentid = $appidformat;
        $appointment->save();

        return redirect('/appointment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointments = Appointment::findOrFail($id);
        return view('appointments.show', ['appointments' => $appointments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointments = Appointment::findOrFail($id);
        return view('appointments.edit', ['appointments' => $appointments]);
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
            'contactnum' => 'required|numeric',
            'email' => 'required|email',
            'datetime' => 'required',
            'purpose' => 'required',
        ]);

        $appointment = Appointment::find($id);
        
        $appointment->firstname = $request->firstname;
        $appointment->lastname = $request->lastname;
        $appointment->contactnum = $request->contactnum;
        $appointment->email = $request->email;
        $appointment->datetime = $request->datetime;
        $appointment->purpose = $request->purpose;
        $appointment->save();

        return redirect('appointment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::destroy($id);
        return redirect('/appointment');
    }
}
