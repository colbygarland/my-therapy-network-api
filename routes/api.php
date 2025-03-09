<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PractitionerAvailabilityController;
use App\Http\Controllers\PractitionerController;
use App\Http\Controllers\PractitionerTypeController;
use App\Http\Controllers\PractitionTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// TODO: ensure all these are behind auth

Route::controller(AppointmentController::class)->group(function () {
    Route::get('/appointments', 'list');
    Route::post('/appointments', 'create');
    Route::patch('/appointments/{id}', 'edit');
    Route::delete('/appointments/{id}', 'delete');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'list');
    Route::post('/companies', 'create');
    Route::patch('/companies/{id}', 'edit');
    Route::delete('/companies/{id}', 'delete');
});

Route::controller(PatientController::class)->group(function () {
    Route::get('/patients', 'list');
    Route::post('/patients', 'create');
    Route::patch('/patients/{user_id}', 'edit');
    Route::delete('/patients/{user_id}', 'delete');
});

Route::controller(PractitionerAvailabilityController::class)->group(function () {
    Route::get('/availability', 'list');
    Route::post('/availability', 'create');
    Route::get('/availability/{id}', 'get');
    Route::patch('/availability/{id}', 'edit');
    Route::delete('/availability/{id}', 'delete');
});

Route::controller(PractitionerController::class)->group(function () {
    Route::get('/practitioners', 'list');
    Route::post('/practitioners', 'create');
    Route::patch('/practitioners/{id}', 'edit');
    Route::delete('/practitioners/{id}', 'delete');
});

Route::controller(PractitionerTypeController::class)->group(function () {
    Route::get('/practitioner-types', 'list');
    Route::post('/practitioner-types', 'create');
    Route::patch('/practitioner-types/{id}', 'edit');
    Route::delete('/practitioner-types/{id}', 'delete');
});

Route::controller(PractitionTypeController::class)->group(function () {
    Route::get('/practition-types', 'list');
    Route::post('/practition-types', 'create');
    Route::patch('/practition-types/{id}', 'edit');
    Route::delete('/practition-types/{id}', 'delete');
});
