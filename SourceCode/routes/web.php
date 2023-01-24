<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersListingController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\Doctor\PatientListingController;
use App\Http\Controllers\MedicalHistory;
use App\Http\Controllers\Medications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPublicController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('layouts.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/userprofile', UserPublicController::class);
Route::resource('/medicalhistory', MedicalHistory::class);
Route::resource('/medicalhistory2', Medications::class);



Route::get('/user_dashboard', 'App\Http\Controllers\User\DashboardController@index')->middleware('role:2');






//********* Admin Routes *********//

Route::middleware('role:1')->group(function () {
    Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::resource('/userList', UsersListingController::class);
    Route::get('/searchadmin', 'App\Http\Controllers\Admin\UsersListingController@search');
   
   
 
});


//********* Doctors Routes *********//

Route::middleware('role:3')->group(function () {
    Route::get('/doctor_dashboard', 'App\Http\Controllers\Doctor\DashboardController@index');
    Route::resource('/patientList', PatientListingController::class);
    Route::get('/search', 'App\Http\Controllers\Doctor\PatientListingController@search');
    Route::resource('/patiendatapage', PatientListingController::class);
    Route::resource('/appointments', DoctorAppointmentController::class);
    Route::get('/searchappointment', 'App\Http\Controllers\Doctor\AppointmentController@search');
    Route::post('/filterappointment', 'App\Http\Controllers\Doctor\AppointmentController@getData');
    Route::resource('/addmedicalrecord', MedicalHistory::class);


   
   
 
});