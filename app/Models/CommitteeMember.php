<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = ['committee_id', 'member_name', 'member_url', 'sort_order'];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }
}
