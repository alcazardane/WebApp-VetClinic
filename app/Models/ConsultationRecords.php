<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ConsultationRecords extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'consultationrecords';
    protected $fillable = ['ownername', 'petname', 'species', 'breed', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['ownername', 'petname', 'species', 'breed'])
                    ->useLogName('CONSULTATION_REC')
                    ->setDescriptionForEvent(fn(string $eventName) => "Consultation Record has been {$eventName}");
    }
}
 