<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function query_store(Request $request)
    {

        $data = Query::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'service'       => $request->service,
            'services'      => $request->services,
            'city'          => $request->city,
            'area'          => $request->area,
            'property_type' => $request->property_type,
            'attend'        => $request->attend,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Query saved successfully',
            'data'    => $data
        ]);
    }
}
