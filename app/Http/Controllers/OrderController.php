<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    public function index()
    {
        // $orders = Order::leftJoin('lead_refs', 'orders.service_reference', '=', 'lead_refs.id')->leftJoin('time_of_services', 'orders.service_time', '=', 'time_of_services.id')->leftJoin('users', 'orders.operator', '=', 'users.id')->leftJoin('services', 'orders.fumigation', '=', 'services.id')->leftJoin('services', 'orders.cleaning', '=', 'services.id')->select('orders.*', 'lead_refs.status_name', 'time_of_services.slot', 'users.name' , 'services.service_name')->get();
        $orders = Order::leftJoin('lead_refs', 'orders.service_reference', '=', 'lead_refs.id')
            ->leftJoin('time_of_services', 'orders.service_time', '=', 'time_of_services.id')
            ->leftJoin('users', 'orders.operator', '=', 'users.id')

            // alias for fumigation service
            ->leftJoin('services as fumigation_service', 'orders.fumigation', '=', 'fumigation_service.id')

            // alias for cleaning service
            ->leftJoin('services as cleaning_service', 'orders.cleaning', '=', 'cleaning_service.id')

            ->select(
                'orders.*',
                'lead_refs.status_name',
                'time_of_services.slot',
                'users.name as operator_name',
                'fumigation_service.service_name as fumigation_name',
                'cleaning_service.service_name as cleaning_name'
            )
            ->get();

        // dd($orders);
        return view('user.order.index', compact('orders'));
    }

    public function edit($id)
    {
        $orders = Order::find($id);
        $users = User::where('user_role', 'operations')->get();
        $fumigations = Service::where('services', 'Fumigation')
            ->select(DB::raw('MIN(id) as id'), 'service_name')
            ->groupBy('service_name')
            ->get();

        $cleanings = Service::where('services', 'Cleaning')
            ->select(DB::raw('MIN(id) as id'), 'service_name')
            ->groupBy('service_name')
            ->get();
        $ids = [1, 2, 3, 5, 12, 13];
        $lead_ref = LeadRef::whereIn('id', $ids)->get();
        $time_of_services = TimeOfService::all();
        return view('user.order.edit', compact('orders', 'users', 'fumigations', 'cleanings', 'lead_ref', 'time_of_services'));
    }
    public function add($id)
    {
        $exists = Attend::where('query_id', $id)
            ->where('attend_id', auth()->user()->id)
            ->exists();

        $querie = Query::find($id);

        $users = User::where('user_role', 'operations')->get();
        $fumigations = Service::where('services', 'Fumigation')
            ->select(DB::raw('MIN(id) as id'), 'service_name')
            ->groupBy('service_name')
            ->get();

        $cleanings = Service::where('services', 'Cleaning')
            ->select(DB::raw('MIN(id) as id'), 'service_name')
            ->groupBy('service_name')
            ->get();
        $ids = [1, 2, 3, 5, 12, 13];
        $lead_ref = LeadRef::whereIn('id', $ids)->get();
        $time_of_services = TimeOfService::all();
        // Generate invoice number only for new attendance
        $last = Order::orderBy('id', 'desc')->first();
        $next = $last ? $last->id + 1 : 1;
        $invoice = 'VFHS/' . str_pad($next, 2, '0', STR_PAD_LEFT);

        if ($exists) {
            return view('user.order.add', compact('querie', 'invoice', 'users', 'fumigations', 'cleanings', 'lead_ref', 'time_of_services'));
        }

        $attend = new Attend();
        $attend->query_id = $id;
        $attend->attend_id = auth()->user()->id;
        $attend->time = now()->toTimeString();
        $attend->date = now()->toDateString();
        $attend->attend = '1';
        $attend->delete = '0';
        $attend->save();

        return view('user.order.add', compact('querie', 'invoice', 'users', 'fumigations', 'cleanings', 'lead_ref', 'time_of_services'));
    }

    public function store(Request $request)
    {
        // Save all incoming request data except _token
        $data = $request->except('_token');

        $order = Order::create($data); // Make sure $fillable is set in Order model

        if ($order) {
            return redirect()->back()->with('success', 'Order saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Order could not be saved.');
        }
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        // token & method remove karo
        $data = $request->except(['_token', '_method']);

        // update
        $order->update($data);

        return redirect()->back()->with('success', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        $order->delete(); // 👈 soft delete

        return redirect()->back()->with('success', 'Order deleted successfully!');
    }
}
