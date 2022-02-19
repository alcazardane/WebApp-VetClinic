<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ReqRecords;
use App\Models\ConsultationHistory;
use App\Models\GroomingHistory;
use App\Models\MedicalHistory;
use App\Models\VaxHistory;
use App\Models\SurgicalHistory;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment = Appointment::all();
        $reqrecord = ReqRecords::all();
        $conhis = ConsultationHistory::all();
        $groominghis = GroomingHistory::all();
        $medicalhis = MedicalHistory::all();
        $vaxhis = VaxHistory::all();
        $surgicalhis = SurgicalHistory::all();
        return view('dashboard.index', ['appointment' => $appointment, 'reqrecord' => $reqrecord, 'conhis' => $conhis, 'groominghis' => $groominghis, 'medicalhis' => $medicalhis, 'vaxhis' => $vaxhis, 'surgicalhis' => $surgicalhis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
