<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Attend;
use App\Models\LeadRef;
use App\Models\Query;
use App\Models\Remarks;
use App\Models\Service;
use App\Models\User;
use App\Models\time_of_service;
use App\Models\TimeOfService;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::leftJoin('services', 'surveys.services', '=', 'services.id')->leftJoin('statuses', 'surveys.status', '=', 'statuses.id')->select('surveys.*', 'services.service_name', 'statuses.status_name')->get();
        // dd($surveys);
        return view('user.survey.index', compact('surveys'));
    }

    public function book($id)
    {
        $exists = Attend::where('query_id', $id)
            ->where('attend_id', auth()->user()->id)
            ->exists();

        $querie = Query::find($id);
        $lead_ref = LeadRef::all();
        $fumigations = Service::whereIn('services', ['Fumigation', 'Cleaning'])
            ->groupBy('service_name')
            ->selectRaw('MIN(id) as id, service_name')
            ->get();

        $status = Status::all();

        // Generate invoice number only for new attendance
        $last = Survey::orderBy('id', 'desc')->first();
        $next = $last ? $last->id + 1 : 1;
        $invoice = 'VS/SR/' . str_pad($next, 2, '0', STR_PAD_LEFT);

        if ($exists) {
            return view('user.survey.add', compact('querie', 'invoice', 'lead_ref', 'fumigations', 'status'));
        }

        $attend = new Attend();
        $attend->query_id = $id;
        $attend->attend_id = auth()->user()->id;
        $attend->time = now()->toTimeString();
        $attend->date = now()->toDateString();
        $attend->attend = '1';
        $attend->delete = '0';
        $attend->save();

        return view('user.survey.add', compact('querie', 'invoice', 'lead_ref', 'fumigations', 'status'));
    }

    public function store(Request $request)
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

    public function edit($id)
    {
        $survey = Survey::find($id);
        $lead_ref = LeadRef::all();
        $fumigations = Service::whereIn('services', ['Fumigation', 'Cleaning'])
            ->groupBy('service_name')
            ->selectRaw('MIN(id) as id, service_name')
            ->get();
        $status = Status::all();
        return view('user.survey.edit', compact('survey', 'lead_ref', 'fumigations', 'status'));
    }

    public function update(Request $request)
    {
        $survey = Survey::find($request->id);
        if (!$survey) {
            return redirect()->back()->with('error', 'Survey not found!');
        }
        // token & method remove karo
        $data = $request->except(['_token', '_method']);
        // update
        $survey->update($data);
        return redirect()->back()->with('success', 'Survey updated successfully!');
    }

    public function destroy($id)
    {
        $survey = Survey::find($id);

        if (!$survey) {
            return redirect()->back()->with('error', 'Survey not found!');
        }

        $survey->delete(); // 👈 soft delete

        return redirect()->back()->with('success', 'Survey deleted successfully!');
    }
}
