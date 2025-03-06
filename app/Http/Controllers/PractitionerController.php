<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    public function list()
    {
        return response()->json([
            'data' => [
                'practitioners' => Practitioner::all(),
                'count' => Practitioner::count(),
            ],
        ]);
    }

    public function create(Request $request)
    {
        $practitioner = new Practitioner;
        $practitioner->fill($request->all());
        $practitioner->save();

        return response()->json([
            'data' => $practitioner,
            'message' => 'Practitioner created successfully',
        ]);
    }

    public function edit() {}

    public function delete() {}
}
