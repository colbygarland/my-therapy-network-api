<?php

namespace App\Http\Controllers;

use App\Models\PractitionerAvailability;
use App\Models\PractitionerType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PractitionerAvailabilityController extends Controller
{
    public function list(Request $request)
    {
        $date = $request->date;
        $withTrashed = $request->with_trashed;
        $practitionType = $request->practition_type_id;

        $data = PractitionerAvailability::when($date, function ($query, $date) {
            $date = Carbon::parse($date);

            return $query->whereDate('start_at', '<=', $date)
                ->whereDate('end_at', '>=', $date);
        })->when($practitionType, function ($query, $practitionType) {
            return $query->where('practition_type_id', $practitionType);
        })
            ->when($withTrashed, function ($query) {
                return $query->withTrashed();
            })->get();

        return response()->json($data);
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
            $practitionerAvailability,
            'message' => 'Practitioner availability created successfully',
        ]);
    }

    public function get(Request $request, int $id)
    {
        $practitionerAvailability = PractitionerAvailability::find($id);

        return response()->json($practitionerAvailability);
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
