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

class OrderController extends Controller
{
    public function add($id)
    {
        $exists = Attend::where('query_id', $id)
            ->where('attend_id', auth()->user()->id)
            ->exists();

        $querie = Query::find($id);

        $users = User::where('user_role', 'operator')->get();
        $fumigations = Service::where('services', 'Fumigation')
            ->select('service_name')
            ->groupBy('service_name')
            ->get();
        $cleanings = Service::where('services', 'Cleaning')
            ->select('service_name')
            ->groupBy('service_name')
            ->get();
        $lead_ref = LeadRef::all();
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

    public function book_survey($id)
    {
        $exists = Attend::where('query_id', $id)
            ->where('attend_id', auth()->user()->id)
            ->exists();

        $querie = Query::find($id);
        $lead_ref = LeadRef::all();
        $fumigations = Service::whereIn('services', ['Fumigation', 'Cleaning'])
            ->select('service_name')
            ->groupBy('service_name')
            ->get();
        $status = Status::all();

        // Generate invoice number only for new attendance
        $last = Survey::orderBy('id', 'desc')->first();
        $next = $last ? $last->id + 1 : 1;
        $invoice = 'VS/SR/' . str_pad($next, 2, '0', STR_PAD_LEFT);

        if ($exists) {
            return view('user.survey.add', compact('querie', 'invoice', 'lead_ref', 'fumigations' , 'status'));
        }

        $attend = new Attend();
        $attend->query_id = $id;
        $attend->attend_id = auth()->user()->id;
        $attend->time = now()->toTimeString();
        $attend->date = now()->toDateString();
        $attend->attend = '1';
        $attend->delete = '0';
        $attend->save();

        return view('user.survey.add', compact('querie', 'invoice', 'lead_ref', 'fumigations' , 'status'));
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

    public function survey_store(Request $request)
    {
        // Save all incoming request data except _token
        $data = $request->except('_token');

        $survey = Survey::create($data); // Make sure $fillable is set in Survey model

        if ($survey) {
            return redirect()->back()->with('success', 'Survey saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Survey could not be saved.');
        }
    }

    public function customer_remarks($id)
    {
        $exists = Attend::where('query_id', $id)
            ->where('attend_id', auth()->user()->id)
            ->exists();

        $querie = Query::find($id);
        $status = Status::all();


        // Generate invoice number only for new attendance
        $last = Survey::orderBy('id', 'desc')->first();
        $next = $last ? $last->id + 1 : 1;
        $invoice = 'VS/SR/' . str_pad($next, 2, '0', STR_PAD_LEFT);

        if ($exists) {
            return view('user.remarks.add', compact('querie', 'invoice', 'status'));
        }

        $attend = new Attend();
        $attend->query_id = $id;
        $attend->attend_id = auth()->user()->id;
        $attend->time = now()->toTimeString();
        $attend->date = now()->toDateString();
        $attend->attend = '1';
        $attend->delete = '0';
        $attend->save();

        return view('user.remarks.add', compact('querie', 'invoice' , 'status'));
    }

    public function remarks_store(Request $request)
    {
        // Save all incoming request data except _token
        $data = $request->except('_token');

        $remarks = Remarks::create($data); // Make sure $fillable is set in Remarks model

        if ($remarks) {
            return redirect()->back()->with('success', 'Remarks saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Remarks could not be saved.');
        }
    }
}
