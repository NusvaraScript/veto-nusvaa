<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Relapses extends Model
{
    //
    protected $fillable = ['vices_id', 'violation_date', 'excuse'];

    public function vices(): BelongsTo {
        return $this->belongsTo(Vices::class, 'vices_id');
    }
}
