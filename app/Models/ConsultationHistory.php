<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ConsultationHistory extends Model
{
    use HasFactory, LogsActivity;
    
    protected $table = 'consultationhistory';
    protected $fillable = ['date', 'procedure', 'weight', 'temp', 'vet', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['date', 'procedure', 'weight', 'temp', 'vet', 'recid'])
                    ->useLogName('CONSULTATION_HIS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Consultation History has been {$eventName}");
    }
}
