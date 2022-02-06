<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $date, $time, $purpose;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date, $time, $purpose)
    {
        $this->date = $date;
        $this->time = $time;
        $this->purpose = $purpose;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Notification')->view('emails.appointmentmail');
    }
}
