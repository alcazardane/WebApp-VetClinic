<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Appointment;
use App\Mail\RecordsMail;

class SendEmailController extends Controller
{
    public function RecordsEmail($id)
    {
        $useremail = Appointment::findorFail($id);
        $date = date('m/d/y', strtotime($useremail->datetime));
        $time = date('h:m A', strtotime($useremail->datetime));
        $purpose = $useremail->purpose;
        Mail::to($useremail->email)->send(new RecordsMail($date, $time, $purpose));

        return redirect('appointment')->with('success', 'Email Sent');
    } 
}
