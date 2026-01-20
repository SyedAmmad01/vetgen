<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractProfile extends Model
{
    protected $fillable = [
        'company_name',
        'company_address',
        'contact_person_name',
        'designation',
        'contact_person_mobile',
        'email_address',
        'ntn_number',
        'invoice_mode',
        'po_number',
        'date_of_contract_execution',
        'date_of_contract_renewal',
        'monthly_number_of_services',
        'scope_of_work',
        'service_execution',
        'time_of_service',
    ];

    use SoftDeletes;
    use HasFactory;
}
