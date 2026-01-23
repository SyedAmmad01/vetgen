<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Query extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'service',
        'services',
        'city',
        'area',
        'property_type',
        'attend',
        'dump',
    ];

    use SoftDeletes;
    use HasFactory;
}
