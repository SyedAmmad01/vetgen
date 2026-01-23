<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function query_store(Request $request)
    {
        $var = $request->all();
        $z = json_encode($var);

        // Convert again to array for usage
        $payload = $request->all();
        $fields = $payload['fields'];

        $data = Query::create([
            'name'          => $fields['name']['value'] ?? null,
            'phone'         => $fields['field_4e60007']['value'] ?? null,
            'email'         => $fields['field_700fe55']['value'] ?? null,
            'service'       => $fields['field_788d881']['value'] ?? null,
            'services'      => $fields['field_79ae624']['value'] ?? null,
            'city'          => $fields['field_f27e238']['value'] ?? null,
            'area'          => $fields['field_ce9e56a']['value'] ?? null,
            'property_type' => $fields['field_0713424']['value'] ?? null,
            'attend'        => null, // because no field in JSON
            'dump'          => $z,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Query saved successfully',
            'data'    => $data
        ]);
    }
}
