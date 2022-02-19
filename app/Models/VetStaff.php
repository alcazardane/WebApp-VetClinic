<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class VetStaff extends Model
{
    use HasFactory, LogsActivity;
    
    protected $table = 'vetstaff';
    protected $fillable = ['firstname', 'lastname', 'sex', 'address', 'contactnum', 'desc', 'vetstaffid', 'email'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['firstname', 'lastname', 'sex', 'address', 'contactnum', 'desc', 'vetstaffid', 'email'])
                    ->useLogName('VETSTAFF')
                    ->setDescriptionForEvent(fn(string $eventName) => "Vet/Staff record has been {$eventName}");
    }
}
