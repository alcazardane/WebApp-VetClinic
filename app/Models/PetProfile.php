<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PetProfile extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'petprofile';
    protected $fillable = ['petname', 'petgender', 'petbreed', 'petspecies', 'owneremail', 'ownername', 'profilepicture'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['petname', 'petgender', 'petbreed', 'petspecies', 'owneremail', 'ownername', 'profilepicture'])
                    ->useLogName('PET_PROFILE')
                    ->setDescriptionForEvent(fn(string $eventName) => "Pet Profile has been {$eventName}");
    }
}