<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PublicRecords extends Model
{
    use HasFactory, LogsActivity;
    
    protected $table = 'publicrecords';
    protected $fillable = ['petname', 'email', 'filerecord'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['petname', 'email', 'filerecord'])
                    ->useLogName('REQUEST_RES')
                    ->setDescriptionForEvent(fn(string $eventName) => "Request respond has been {$eventName}");
    }
}
