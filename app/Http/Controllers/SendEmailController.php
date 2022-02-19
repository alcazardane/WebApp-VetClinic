<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Appointment;
use App\Mail\RecordsMail;
use Auth;

class SendEmailController extends Controller
{
    public function RecordsEmail($id)
    {
        $useremail = Appointment::findorFail($id);
        $date = date('m/d/y', strtotime($useremail->datetime));
        $time = date('h:i A', strtotime($useremail->datetime));
        $purpose = $useremail->purpose;
        Mail::to($useremail->email)->send(new RecordsMail($date, $time, $purpose));

        activity('EMAIL')
            ->causedBy(Auth::user()->id)
            ->event('email sent')
            ->log('An email has been sent');

        return redirect('appointment')->with('success', 'Email Sent');
    } 
}
