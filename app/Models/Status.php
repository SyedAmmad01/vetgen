<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    protected $fillable = [
        'status_name',
        'status',
    ];

    use SoftDeletes;
    use HasFactory;
}
