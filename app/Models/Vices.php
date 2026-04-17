<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vices extends Model
{
    //
    protected $fillable = ['habit_name', 'penalty', 'severity', 'streak_days'];
}
