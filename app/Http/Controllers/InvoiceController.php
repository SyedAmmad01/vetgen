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
use PDF;

class InvoiceController extends Controller
{
    public function invoices_generate_private($id)
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
        return view('user.invoices.invoice_generate_private', compact('orders', 'users', 'fumigations', 'lead_ref', 'time_of_services'));
    }

    public function invoices_generate_srb($id)
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
        return view('user.invoices.invoice_generate_srb', compact('orders', 'users', 'fumigations', 'lead_ref', 'time_of_services'));
    }

    public function invoices_private_store(Request $request)
    {
        // 1️⃣ Save Invoice
        $invoice = Invoice::create([
            'order_id' => $request->id,
            'service_type' => $request->service_type,
            'service'       => implode(',', $request->fumigation),
            'service_qty'   => implode(',', $request->service_qty),
            'service_price' => implode(',', $request->service_price),
            'customer_name'    => $request->customer_name,
            'customer_address' => $request->customer_address,
            'phone'            => $request->phone,
            'date'             => $request->date,
            'invoice_no'       => $request->invoice_no,
            'billing_period'   => $request->billing_period,
            'sub_total'        => $request->sub_total,
            'discount'         => $request->discount,
            'advance_payment'  => $request->advance_payment,
            'choose_time'      => $request->choose_time,
            'total'            => $request->total,
        ]);

        // 2️⃣ Show invoice preview
        return view('user.reports.repo', compact('invoice'))
            ->with('success', 'Invoice saved successfully');
    }


    public function invoices_srb_store(Request $request)
    {
       $invoice = Invoice::create([
            'order_id' => $request->id,
            'service_type' => $request->service_type,
            'service'       => implode(',', $request->fumigation),
            'service_qty'   => implode(',', $request->service_qty),
            'service_price' => implode(',', $request->service_price),
            'customer_name'    => $request->customer_name,
            'customer_address' => $request->customer_address,
            'phone'            => $request->phone,
            'date'             => $request->date,
            'ntn'               => $request->ntn,
            'client_ntn_number' => $request->client_ntn_number,
            'srb'               => $request->srb,
            'percentage'        => $request->percentage,
            'remarks'           => $request->remarks,
            'invoice_no'      => $request->invoice_no,
            'billing_period'  => $request->billing_period,
            'advance_payment' => $request->advance_payment,
            'choose_time'            => $request->choose_time,
            'sub_total'        => $request->sub_total,
            'total'            => $request->total,
            'discount'         => $request->discount,

        ]);

         // 2️⃣ Show invoice preview
        return view('user.reports.report', compact('invoice'))
            ->with('success', 'Invoice saved successfully');
    }

    // 3️⃣ PDF Download Route
    public function downloadInvoicePDF($id)
    {
        $invoice = Invoice::findOrFail($id);

        $pdf = PDF::loadView('user.reports.pdf_invoice', compact('invoice'));

        return $pdf->download('Invoice_' . $invoice->invoice_no . '.pdf');
    }
}
