<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindPatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function list()
    {
        return response()->json(Patient::all());
    }

    public function get(Request $request, int $user_id)
    {
        $patient = Patient::find($user_id);
        if (! $patient) {
            return response()->json([
                'error' => 'Patient not found',
            ], 404);
        }

        return response()->json($patient);
    }

    public function find(FindPatientRequest $request)
    {
        $patient = Patient::where('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->first();
        if (! $patient) {
            return response()->json('Patient not found', 404);
        }

        return response()->json($patient);
    }

    public function create(Request $request)
    {
        $patient = new Patient;
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->save();

        return response()->json($patient, 201);
    }

    public function edit(Request $request, int $user_id)
    {
        $request->validate([
            'name' => 'max:255',
            'email' => 'email|max:255',
            'phone' => 'max:255',
        ]);

        $patient = Patient::find($user_id);
        if (! $patient) {
            return response()->json([
                'error' => 'Patient not found',
            ], 404);
        }
        $patient->name = $request->name ?? $patient->name;
        $patient->email = $request->email ?? $patient->email;
        $patient->phone = $request->phone ?? $patient->phone;
        $patient->save();

        return response()->json($patient);
    }
}
