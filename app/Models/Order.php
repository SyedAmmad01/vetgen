<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = [
        'date',
        'invoice_no',
        'operator',
        'fumigation',
        'cleaning',
        'service_reference',
        'service_time',
        'customer',
        'address',
        'contact',
        'amount',
        'service_status',
        'payment_status',
        'attend_id',
        'remarks',
    ];

    use SoftDeletes;
    use HasFactory;
}
