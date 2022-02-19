<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SurgicalHistory extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'surgicalhistory';
    protected $fillable = ['datetime', 'weight', 'procedure', 'pam', 'aa', 'sas', 'techinit', 'assinit', 'vetinit', 'lengthsurgery', 'specimens', 'comments', 'recid'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['datetime', 'weight', 'procedure', 'pam', 'aa', 'sas', 'techinit', 'assinit', 'vetinit', 'lengthsurgery', 'specimens', 'comments', 'recid'])
                    ->useLogName('SURGICAL_HIS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Surgical History has been {$eventName}");
    }
}
