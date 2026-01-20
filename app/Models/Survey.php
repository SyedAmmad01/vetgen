<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    protected $fillable = [
        'survey_number',
        'date',
        'services',
        'contact_person',
        'contact_details',
        'time',
        'address',
        'assign_to',
        'amount',
        'status',
        'company_name',
        'current_status',
    ];

    use SoftDeletes;
    use HasFactory;
}
