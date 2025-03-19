<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppointmentRequest;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function list()
    {
        $data = Appointment::get();

        return response()->json($data);
    }

    public function create(CreateAppointmentRequest $request)
    {
        $appointment = new Appointment;
    }

    public function edit() {}

    public function delete() {}
}
