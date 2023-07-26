<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['event_name', 'event_description', 'event_start', 'event_end', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attendee()
    {
        return $this->hasMany(Attendee::class);
    }
}