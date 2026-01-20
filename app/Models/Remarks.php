<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remarks extends Model
{

    protected $fillable = [
        'query_id',
        'status',
        'remarks',
        'remarks_two',
        'remarks_three',
    ];

    use SoftDeletes;
    use HasFactory;
}
