<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecords;
use App\Models\ConsultationRecords;
use App\Models\VaxRecords;
use App\Models\Appointment;
use App\Models\GroomingRecords;
use App\Models\SurgicalRecords;
use App\Models\VetStaff;

class ArchiveController extends Controller
{
    public function index()
    {
        return view('archive.index');
    }

    /**
     * ARCHIVE HEALTH RECORDS
     */
    public function archealthrecords()
    {
        $healthrecords = HealthRecords::all();
        return view('archive.healthrecords', ['healthrecords' => $healthrecords]);
    }

    public function activatehealthrecord($id)
    {
        $records = HealthRecords::find($id);
        $records->status = 'active';
        $records->save();

        return back();
    }

    /**
     * ARCHIVE CONSULTATION RECORDS
     */
    public function arcconsultationrecords()
    {
        $records = ConsultationRecords::all();
        return view('archive.consultationrecords', ['records' => $records]);
    }

    public function activateconsultationrecord($id)
    {
        $records = ConsultationRecords::find($id);
        $records->status = 'active';
        $records->save();

        return back();
    }

    /**
     * ARCHIVE VACCINE RECORDS
     */
    public function arcvaxrecords()
    {
        $vaxrecords = VaxRecords::all();
        return view('archive.vaxrecords', ['vaxrecords' => $vaxrecords]);
    }

    public function activatevaxrecord($id)
    {
        $vaxrecords = VaxRecords::find($id);
        $vaxrecords->status = 'active';
        $vaxrecords->save();

        return back();
    }

    /**
     * ARCHIVE APPOINTMENTS
     */
    public function arcappointments()
    {
        $appointments = Appointment::all();
        return view('archive.appointments', ['appointments' => $appointments]);
    }

    public function activateappointment($id)
    {
        $appointments = Appointment::find($id);
        $appointments->status = 'active';
        $appointments->save();

        return back();
    }

    /**
     * ARCHIVE GROOMING RECORDS
     */
    public function arcgroomingrecords()
    {
        $groomingrecords = GroomingRecords::all();
        return view('archive.groomingrecords', ['groomingrecords' => $groomingrecords]);
    }

    public function activategroomingrecord($id)
    {
        $groomingrecords = GroomingRecords::find($id);
        $groomingrecords->status = 'active';
        $groomingrecords->save();

        return back();
    }

    /**
     * ARCHIVE SURGICAL RECORDS
     */
    public function arcsurgicalrecords()
    {
        $records = SurgicalRecords::all();
        return view('archive.surgicalrecords', ['records' => $records]);
    }

    public function activatesurgicalrecord($id)
    {
        $records = SurgicalRecords::find($id);
        $records->status = 'active';
        $records->save();

        return back();
    }

    /**
     * ARCHIVE VET & STAFF RECORDS
     */
    public function arcvetstaff()
    {
        $vetstaff = VetStaff::all();
        return view('archive.vetstaff', ['vetstaff' => $vetstaff]);
    }

    public function activatevetstaff($id)
    {
        $vetstaff = VetStaff::find($id);
        $vetstaff->status = 'active';
        $vetstaff->save();

        return back();
    }
}
