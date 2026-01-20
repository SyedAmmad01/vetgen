<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeOfService extends Model
{
    protected $fillable = [
        'slot',
        'durations',
    ];

    use SoftDeletes;
    use HasFactory;
}
