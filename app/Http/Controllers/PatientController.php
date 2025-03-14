<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function list()
    {
        return response()->json(Patient::all());
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:255',
            'email' => 'bail|required|email|max:255',
            'phone' => 'bail|required|max:255',
        ]);

        $patient = new Patient;
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->save();

        return response()->json([
            'data' => [
                'patient' => $patient,
            ],
        ]);
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

        return response()->json([
            'data' => [
                'patient' => $patient,
            ],
        ]);
    }
}
