<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class HealthRecords extends Model
{
    use HasFactory, LogsActivity;

    public $table = 'healthrecords';
    protected $fillable = ['ownername', 'petname', 'address', 'birthday', 'species', 'breed', 'contactnum', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['ownername', 'petname', 'address', 'birthday', 'species', 'breed', 'contactnum', 'recid'])
                    ->useLogName('HEALTH_REC')
                    ->setDescriptionForEvent(fn(string $eventName) => "Health Record has been {$eventName}");
    }
}
