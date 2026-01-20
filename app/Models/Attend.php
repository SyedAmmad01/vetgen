<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attend extends Model
{
    protected $fillable = [
        'query_id',
        'time',
        'date',
        'attend',
        'delete',
    ];

    use SoftDeletes;
    use HasFactory;
}
