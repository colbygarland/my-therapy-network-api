<?php

namespace App\Http\Controllers;

use App\Models\PractitionerType;
use Exception;
use Illuminate\Http\Request;

class PractitionerTypeController extends Controller
{
    public function list()
    {
        PractitionerType::$withoutAppends = true;

        return response()->json([
            'data' => PractitionerType::all(),
            'count' => PractitionerType::count(),
        ]);
    }

    public function create(Request $request)
    {
        $practitionerType = new PractitionerType;
        $practitionerType->fill($request->all());
        $practitionerType->save();

        return response()->json([
            'data' => $practitionerType,
            'message' => 'Practitioner type created successfully',
        ]);
    }

    public function edit()
    {
        throw new Exception('Method not implemented');
    }

    public function delete()
    {
        throw new Exception('Method not implemented');
    }
}
