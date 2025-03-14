<?php

namespace App\Http\Controllers;

use App\Models\PractitionType;
use Exception;
use Illuminate\Http\Request;

class PractitionTypeController extends Controller
{
    public function list()
    {
        return response()->json(PractitionType::all());
    }

    public function create(Request $request)
    {
        $practitionerType = new PractitionType;
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
