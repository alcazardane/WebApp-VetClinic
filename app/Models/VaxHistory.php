<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class VaxHistory extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'vaxhistory';
    protected $fillable = ['vaxdesc', 'vet', 'status', 'date', 'fdate', 'recid', 'owneremail', 'ownername'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['vaxdesc', 'vet', 'status', 'date', 'fdate', 'recid', 'owneremail', 'ownername'])
                    ->useLogName('VACCINE_HIS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Vaccine History has been {$eventName}");
    }
}
