<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Attend;
use App\Models\LeadRef;
use App\Models\Query;
use App\Models\Remarks;
use App\Models\Service;
use App\Models\Survey;
use App\Models\User;
use App\Models\time_of_service;
use App\Models\TimeOfService;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function invoices_generate($id)
    {
        $orders = Order::find($id);
        $users = User::where('user_role', 'operations')->get();
        $fumigations = Service::whereIn('services', ['Fumigation', 'Cleaning'])
            ->select('service_name')
            ->selectRaw('MIN(id) as id')
            ->groupBy('service_name')
            ->get();
        $ids = [1, 2, 3, 5, 12, 13];
        $lead_ref = LeadRef::whereIn('id', $ids)->get();
        $time_of_services = TimeOfService::all();
        $last = Invoice::orderBy('id', 'desc')->first();
        $next = $last ? $last->id + 1 : 1;
        $invoice = 'INV' . str_pad($next, 2, '0', STR_PAD_LEFT);

        return view('user.invoices.invoice_generate', compact('orders', 'users', 'fumigations', 'lead_ref', 'time_of_services' , 'invoice'));
    }
}
