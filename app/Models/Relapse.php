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
}
