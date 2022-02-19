<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Appointment extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'appointments';
    protected $fillable = ['firstname', 'lastname', 'contactnum', 'email', 'purpose', 'datetime', 'appointmentid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['firstname', 'lastname', 'contactnum', 'email', 'purpose', 'datetime', 'status'])
                    ->useLogName('APPOINTMENT')
                    ->setDescriptionForEvent(fn(string $eventName) => "Appointment has been {$eventName}");
    }
}