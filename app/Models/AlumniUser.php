<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AlumniUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'alumni_users';
    protected $guard = 'alumni';

    protected $fillable = [
        'full_name', 'email', 'password', 'entry', 'ccp_no', 'house',
        'education', 'field_of_study', 'field_of_work', 'current_city',
        'current_country', 'current_designation', 'current_organization',
        'phone_number', 'achievements', 'profile_photo', 'cnic_file',
        'consent_sharing', 'agree_terms', 'privacy_settings', 'status',
        'is_active', 'is_star_alumni', 'star_description', 'featured_text',
        'class_year',
    ];

    protected $casts = [
        'privacy_settings' => 'array',
        'consent_sharing'  => 'boolean',
        'agree_terms'      => 'boolean',
        'is_active'        => 'boolean',
        'is_star_alumni'   => 'boolean',
        'password'         => 'hashed',   // Laravel 10+ auto-hashing
    ];

    protected $hidden = ['password', 'remember_token'];

    public function eventParticipants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_participants')
                    ->withPivot('status')->withTimestamps();
    }
}