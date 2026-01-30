<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_type',
        'service',
        'service_qty',
        'service_price',
        'customer_name',
        'customer_address',
        'phone',
        'date',
        'ntn',
        'client_ntn_number',
        'srb',
        'percentage',
        'remarks',
        'invoice_no',
        'billing_period',
        'advance_payment',
        'choose_time',
        'sub_total',
        'total',
        'discount',
    ];
}
