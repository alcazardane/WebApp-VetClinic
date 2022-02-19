<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class GroomingRecords extends Model
{
    use HasFactory, LogsActivity;

    public $table = 'groomingrecords';
    protected $fillable = ['ownername', 'petname', 'breed', 'species', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['ownername', 'petname', 'breed', 'species', 'recid'])
                    ->useLogName('GROOMING_REC')
                    ->setDescriptionForEvent(fn(string $eventName) => "Grooming Record has been {$eventName}");
    }
}
