<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SurgicalRecords extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'surgicalrecords';
    protected $fillable = ['ownername', 'petname', 'species', 'breed', 'gender', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['ownername', 'petname', 'species', 'breed', 'gender', 'recid'])
                    ->useLogName('SURGICAL_REC')
                    ->setDescriptionForEvent(fn(string $eventName) => "Surgical Record has been {$eventName}");
    }
}