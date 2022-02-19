<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class UserModel extends Model
{
    use HasFactory, LogsActivity;
    
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'user_type'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['name', 'email', 'user_type'])
                    ->useLogName('USER')
                    ->setDescriptionForEvent(fn(string $eventName) => "User record has been {$eventName}");
    }
}