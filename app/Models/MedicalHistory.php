<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MedicalHistory extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'medicalhistory';
    protected $fillable = ['date', 'weight', 'temp', 'checkup', 'treatment', 'vxmx', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['date', 'weight', 'temp', 'checkup', 'treatment', 'vxmx', 'recid'])
                    ->useLogName('HEALTH_HIS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Health History has been {$eventName}");
    }
}
