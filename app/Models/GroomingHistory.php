<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class GroomingHistory extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'groominghistory';
    protected $fillable = ['date', 'services', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['date', 'services', 'recid'])
                    ->useLogName('GROOMING_HIS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Grooming History has been {$eventName}");
    }
}
