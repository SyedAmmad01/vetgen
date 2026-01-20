<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadRef extends Model
{
    protected $fillable = [
        'status_name',
        'status',
    ];

    use SoftDeletes;
    use HasFactory;
}
