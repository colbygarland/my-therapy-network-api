<?php

namespace App\Http\Controllers;

use App\Models\PractitionerAvailability;
use App\Models\PractitionerType;
use Illuminate\Http\Request;

class PractitionerAvailabilityController extends Controller
{
    public function list(Request $request)
    {
        $data = $request->with_trashed ? PractitionerAvailability::withTrashed()->get() : PractitionerAvailability::all();

        return response()->json([
            'data' => $data,
            'count' => PractitionerAvailability::count(),
        ]);
    }

    public function create(Request $request)
    {
        $practitionerAvailability = new PractitionerAvailability;

        // Ensure that the practitioner can do the practice type
        $practitionerType = PractitionerType::where('practitioner_id', $request->practitioner_id)
            ->where('type_id', $request->practition_type_id)
            ->firstOrFail();

        $practitionerAvailability->fill($request->all());
        $practitionerAvailability->save();

        return response()->json([
            'data' => $practitionerAvailability,
            'message' => 'Practitioner availability created successfully',
        ]);
    }

    public function get(Request $request, int $id)
    {
        $practitionerAvailability = PractitionerAvailability::find($id);

        return response()->json([
            'data' => $practitionerAvailability,
        ]);
    }

    public function edit() {}

    public function delete(Request $request, int $id)
    {
        $hardDelete = $request->hard_delete ?? false;
        $practitionerAvailability = PractitionerAvailability::withTrashed()->find($id);
        $hardDelete ?
            $practitionerAvailability->forceDelete() :
            $practitionerAvailability->delete();

        return response()->json([
            'message' => 'Practitioner availability deleted successfully',
        ]);
    }
}
