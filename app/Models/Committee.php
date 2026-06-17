<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable = ['title', 'description', 'type'];

    public function members()
    {
        return $this->hasMany(CommitteeMember::class)->orderBy('sort_order');
    }
}
