<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Report extends Model
{
    use HasFactory, LogsActivity;
    
    protected $table = 'report';
    protected $fillable = ['appointment', 'health', 'vaccine',  'grooming', 'consultation', 'surgical', 'reporteddate'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logAll(['*'])
                    ->useLogName('REPORT')
                    ->setDescriptionForEvent(fn(string $eventName) => "Report has been {$eventName}");
    }
}