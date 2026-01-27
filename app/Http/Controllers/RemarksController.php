<?php

namespace App\Http\Controllers;

use App\Models\Remarks;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Attend;
use App\Models\LeadRef;
use App\Models\Query;
use App\Models\Service;
use App\Models\Survey;
use App\Models\User;
use App\Models\time_of_service;
use App\Models\TimeOfService;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class RemarksController extends Controller
{
    public function index()
    {
        $remarks = Remarks::leftJoin('statuses', 'remarks.status', '=', 'statuses.id')->select('remarks.*', 'statuses.status_name')->get();
        return view('user.remarks.index', compact('remarks'));
    }

    public function customer($id)
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

        return view('user.remarks.add', compact('querie', 'invoice', 'status'));
    }

    public function create(Request $request)
    {
        $querie = Query::all();
        $status = Status::all();
        // Generate invoice number only for new attendance
        $last = Survey::orderBy('id', 'desc')->first();
        $next = $last ? $last->id + 1 : 1;
        $invoice = 'VS/SR/' . str_pad($next, 2, '0', STR_PAD_LEFT);

        return view('user.remarks.create', compact('querie', 'invoice', 'status'));
    }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     // Save all incoming request data except _token
    //     $data = $request->except('_token');

    //     $remarks = Remarks::create($data); // Make sure $fillable is set in Remarks model

    //     if ($remarks) {
    //         return redirect()->back()->with('success', 'Remarks saved successfully!');
    //     } else {
    //         return redirect()->back()->with('error', 'Remarks could not be saved.');
    //     }
    // }

    public function store(Request $request)
    {
        // Validate input (optional but recommended)
        $request->validate([
            'query_id' => 'required',
            'remarks'  => 'required|string',
        ]);

        // Check if same remark already exists for this query_id
        $exists = Remarks::where('query_id', $request->query_id)
            ->where('remarks', $request->remarks)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('msg', 'This remark already exists for this query!');
        }

        // Save data
        $data = $request->except('_token');
        $remarks = Remarks::create($data);

        if ($remarks) {
            return redirect()->back()->with('success', 'Remarks saved successfully!');
        } else {
            return redirect()->back()->with('msg', 'Remarks could not be saved.');
        }
    }


    public function edit($id)
    {
        $remarks = Remarks::find($id);
        $status = Status::all();
        return view('user.remarks.edit', compact('remarks', 'status'));
    }

    public function update(Request $request)
    {
        $remarks = Remarks::find($request->id);
        if (!$remarks) {
            return redirect()->back()->with('msg', 'Remarks not found!');
        }
        // token & method remove karo
        $data = $request->except(['_token', '_method']);
        // update
        $remarks->update($data);
        return redirect()->back()->with('success', 'Survey updated successfully!');
    }

    public function destroy($id)
    {
        $remarks = Remarks::find($id);

        if (!$remarks) {
            return redirect()->back()->with('msg', 'Remarks not found!');
        }

        $remarks->delete(); // 👈 soft delete

        return redirect()->back()->with('success', 'Remarks deleted successfully!');
    }
}
