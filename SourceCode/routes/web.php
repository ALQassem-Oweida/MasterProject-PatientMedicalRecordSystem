<?php


use App\Http\Controllers\Admin\DoctorListingController;
use App\Http\Controllers\Admin\MessagesListingController;
use App\Http\Controllers\Admin\RegisterDocotorController;
use App\Http\Controllers\Admin\UsersListingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\Doctor\PatientListingController;
use App\Http\Controllers\LandingController;
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



Route::resource('/', LandingController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/userprofile', UserPublicController::class);
Route::resource('/medicalhistory', MedicalHistory::class);
Route::resource('/medicalhistory2', Medications::class);
Route::get('/user_dashboard', 'App\Http\Controllers\User\DashboardController@index')->middleware('role:2');
Route::resource('/messages', MessagesListingController::class);
Route::resource('/contactUs', ContactUsController::class);





//********* Admin Routes *********//

Route::middleware('role:1')->group(function () {
    Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::resource('/userList', UsersListingController::class);
    Route::resource('/doctorList', DoctorListingController::class);
    Route::get('/searchadmin', 'App\Http\Controllers\Admin\UsersListingController@search');
    Route::get('/searchdocadmin', 'App\Http\Controllers\Admin\DoctorListingController@search');
    Route::get('/filterusers', 'App\Http\Controllers\Admin\UsersListingController@getData');
    Route::get('/filterdoctors', 'App\Http\Controllers\Admin\DoctorListingController@getData');
    Route::resource('/registerdoctor', RegisterDocotorController::class);
    
    Route::get('/searchMessages', 'App\Http\Controllers\Admin\MessagesListingController@search');
    Route::get('/filterMessages', 'App\Http\Controllers\Admin\MessagesListingController@getData');
    Route::post('/update-status', 'App\Http\Controllers\Admin\MessagesListingController@updateStatus');
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
