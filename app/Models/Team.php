<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    // use SoftDeletes;

    public function buyers():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'buyer_team', 'team_id', 'buyer_id');
    }

    public function owner():BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_owner_id');
    }
}
