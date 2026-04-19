<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vice extends Model
{
    //
    protected $fillable = ['habit_name', 'description', 'severity', 'streak_days'];
}
