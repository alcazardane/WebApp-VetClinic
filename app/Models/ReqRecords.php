<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ReqRecords extends Model
{
    use HasFactory, LogsActivity;

    protected $table ='reqrecords';
    protected $fillable = ['name', 'email', 'request', 'petname', 'status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['name', 'email', 'request', 'petname', 'status'])
                    ->useLogName('REQUEST_REC')
                    ->setDescriptionForEvent(fn(string $eventName) => "Request has been {$eventName}");
    }
}
