<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class VaxRecords extends Model
{
    use HasFactory, LogsActivity;

    public $table = 'vaxrecords';
    protected $fillable = ['ownername', 'petname', 'species', 'breed', 'owneremail', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['ownername', 'petname', 'species', 'breed', 'owneremail', 'recid'])
                    ->useLogName('VACCINE_REC')
                    ->setDescriptionForEvent(fn(string $eventName) => "Vaccine Record has been {$eventName}");
    }
}
