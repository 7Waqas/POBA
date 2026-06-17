<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $fillable = ['event_id', 'alumni_user_id', 'status'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function alumniUser()
    {
        return $this->belongsTo(AlumniUser::class);
    }
}
