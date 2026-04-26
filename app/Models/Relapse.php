<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Relapse extends Model
{
    //
    protected $fillable = ['vices_id', 'violation_date', 'excuse'];

    public function vice(): BelongsTo {
        return $this->belongsTo(Vice::class, 'vices_id');
    }

    // Accessor untuk kompatibilitas dengan nama lama
    public function getRelapseDateAttribute(): string {
        return $this->violation_date;
    }

    public function getNotesAttribute(): string {
        return $this->excuse;
    }
}
