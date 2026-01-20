<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    protected $fillable = [
        'name',
        'team_type',
    ];

    use SoftDeletes;
    use HasFactory;
}
