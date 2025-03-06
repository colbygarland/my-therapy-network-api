<?php

namespace App\Http\Controllers;

use App\Models\PractitionerAvailability;
use Illuminate\Http\Request;

class PractitionerAvailabilityController extends Controller
{
    public function list()
    {
        return response()->json([
            'data' => PractitionerAvailability::all(),
            'count' => PractitionerAvailability::count(),
        ]);
    }

    public function create(Request $request)
    {
        $practitionerAvailability = new PractitionerAvailability;
        $practitionerAvailability->fill($request->all());
        $practitionerAvailability->save();

        return response()->json([
            'data' => $practitionerAvailability,
            'message' => 'Practitioner availability created successfully',
        ]);
    }

    public function edit() {}

    public function delete(Request $request, int $id)
    {
        $practitionerAvailability = PractitionerAvailability::find($id);
        $practitionerAvailability->delete();

        return response()->json([
            'message' => 'Practitioner availability deleted successfully',
        ]);
    }
}
