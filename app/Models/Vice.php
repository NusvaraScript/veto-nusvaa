<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vice extends Model
{
    protected $fillable = ['user_id', 'habit_name', 'description', 'severity', 'streak_days'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relapses(): HasMany
    {
        return $this->hasMany(Relapse::class, 'vices_id');
    }
}
