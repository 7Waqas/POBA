<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'location', 'start_date', 'end_date',
        'start_time', 'end_time', 'registration_required', 'focal_person_name',
        'focal_person_number', 'entry_batches', 'logo', 'is_upcoming',
    ];

    protected $casts = [
        'entry_batches'         => 'array',
        'registration_required' => 'boolean',
        'is_upcoming'           => 'boolean',
    ];

    public function participants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function alumniUsers()
    {
        return $this->belongsToMany(AlumniUser::class, 'event_participants')
                    ->withPivot('status')->withTimestamps();
    }
}
