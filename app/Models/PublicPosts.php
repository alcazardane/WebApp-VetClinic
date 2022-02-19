<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PublicPosts extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'publicposts';
    protected $fillable = ['title', 'body', 'coverimage', 'status'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                    ->logOnly(['title', 'body', 'coverimage', 'status'])
                    ->useLogName('PUB_POSTS')
                    ->setDescriptionForEvent(fn(string $eventName) => "Public Post has been {$eventName}");
    }
}
