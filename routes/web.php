<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale(config("app.locale"));

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name("dashboard");

    Route::get('/patients','PatientController@index')->name('patients');

    Route::get('/patients/new', 'PatientController@create')->name('patients.new');

    Route::get('/patients/edit/{id}', 'PatientController@edit')->name('patients.edit');
    
    Route::post('/patients/save', 'PatientController@store')->name('patients.save');

    Route::post('/patients/update', 'PatientController@update')->name('patients.update');

    Route::get('/patient/{id}', 'PatientController@show')->name('patient');

    Route::get('/patient/delete/{id}', 'PatientController@destroy')->name('patient.remove');

    Route::get('/medical-appointments', function() {
        return view("doctor.medical_appointments");
    })->name('medical_appointments');

    Route::get('/medical-appointments/new', function() {
        //return view("doctor.medical_appointments_new");
    })->name('medical_appointments.new');

    Route::get('/evolution-note/new/{id}', 'TracingController@create')->name('evolution_note.new');
    Route::post('/evolution-note/save', 'TracingController@store')->name('evolution_note.save');
    Route::get('/evolution-note/edit/{$id}', 'TracingController@edit')->name('evolution_note.edit');
    Route::post('/evolution-note/save', 'TracingController@update')->name('evolution_note.update');
    Route::get('/evolution-note/{id}', 'TracingController@show')->name('evolution_note');

    Route::get('/attachments', 'StudiesController@create');
    Route::post('/attachments/save', 'StudiesController@store');
    Route::get('/attachments/delete/{id}', 'StudiesController@destroy');
    Route::get('/attachments/show/{filename}', 'StudiesController@show');
    Route::get('/attachments/download/{filename}', 'StudiesController@download');

    Route::get('/prescription/new', 'PrescriptionController@create')->name('prescription.new');
});

