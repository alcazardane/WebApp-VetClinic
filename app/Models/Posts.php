<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Posts extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'coverimage', 'status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['title', 'body', 'coverimage', 'status'])
                    ->useLogName('POSTS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Post has been {$eventName}");
    }
}