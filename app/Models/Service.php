<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    protected $fillable = [
        'code',
        'services',
        'service_name',
        'service_type',
        'quantity',
    ];

    use SoftDeletes;
    use HasFactory;
}
