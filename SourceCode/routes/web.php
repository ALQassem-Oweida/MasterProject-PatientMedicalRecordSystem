<?php


use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\DoctorListingController;
use App\Http\Controllers\Admin\InsuranceController as AdminInsuranceController;
use App\Http\Controllers\Admin\MessagesListingController;
use App\Http\Controllers\Admin\RegisterDocotorController;
use App\Http\Controllers\Admin\RegisterUserController;
use App\Http\Controllers\Admin\UsersListingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\Doctor\FileController;
use App\Http\Controllers\Doctor\PatientListingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MedicalHistory;
use App\Http\Controllers\Medications;
use App\Http\Controllers\newsController;
use App\Http\Controllers\User\userAppointmentController;
use App\Http\Controllers\User\userFilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPublicController;




//********* Website Pages Routes *********//

Route::resource('/', LandingController::class);
Route::resource('/contactUs', ContactUsController::class);
Route::resource('/aboutUs', AboutUsController::class);
Route::resource('/news', newsController::class);




//********* Auth Routes *********//

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//********* Admin Routes *********//

Route::middleware('role:1')->group(function () {
    Route::resource('/userprofileAdmin', UserPublicController::class);
    Route::resource('/registerdoctor', RegisterDocotorController::class);
    Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
    
    Route::resource('/userList', UsersListingController::class);
    Route::get('/searchadmin', 'App\Http\Controllers\Admin\UsersListingController@search');
    Route::get('/filterusers', 'App\Http\Controllers\Admin\UsersListingController@getData');

    Route::resource('/doctorList', DoctorListingController::class);
    Route::get('/searchdocadmin', 'App\Http\Controllers\Admin\DoctorListingController@search');
    Route::get('/filterdoctors', 'App\Http\Controllers\Admin\DoctorListingController@getData');


    Route::resource('/registeruser', RegisterUserController::class);
    Route::get('/filterUserInfos', 'App\Http\Controllers\Admin\RegisterUserController@getData');
    Route::get('/searchUserInfos', 'App\Http\Controllers\Admin\RegisterUserController@search');

    Route::resource('/messages', MessagesListingController::class);
    Route::get('/searchMessages', 'App\Http\Controllers\Admin\MessagesListingController@search');
    Route::get('/filterMessages', 'App\Http\Controllers\Admin\MessagesListingController@getData');
    Route::post('/update-status', 'App\Http\Controllers\Admin\MessagesListingController@updateStatus');

    Route::resource('/InsuranceCo', AdminInsuranceController::class);
    Route::get('/searchCompanyadmin', 'App\Http\Controllers\Admin\InsuranceController@search');
});




//********* Doctors Routes *********//

Route::middleware('role:3')->group(function () {
    Route::resource('/userprofileDoctor', UserPublicController::class);
    Route::resource('/addmedicalrecord', MedicalHistory::class);
    Route::resource('/uploadFile', FileController::class);
    Route::get('/doctor_dashboard', 'App\Http\Controllers\Doctor\DashboardController@index');

    Route::resource('/patientList', PatientListingController::class);
    Route::resource('/patiendatapage', PatientListingController::class);
    Route::get('/search', 'App\Http\Controllers\Doctor\PatientListingController@search');
    Route::get('/filterusersDoctor', 'App\Http\Controllers\Doctor\PatientListingController@getData');

    Route::resource('/appointments', DoctorAppointmentController::class);
    Route::get('/searchappointment', 'App\Http\Controllers\Doctor\AppointmentController@search');
    Route::post('/filterappointment', 'App\Http\Controllers\Doctor\AppointmentController@getData');
});




//********* User Routes *********//

Route::middleware('role:2')->group(function () {
    Route::resource('/userprofile', UserPublicController::class);
    Route::resource('/medicalhistory', MedicalHistory::class);
    Route::resource('/medicalhistory2', Medications::class);
    Route::get('/user_dashboard', 'App\Http\Controllers\User\DashboardController@index');
    
    Route::resource('/userAppointments', userAppointmentController::class);
    Route::get('/searchUserAppointments', 'App\Http\Controllers\User\userAppointmentController@search');
    Route::post('/filterUserAppointments', 'App\Http\Controllers\User\userAppointmentController@getData');

    Route::resource('/userFiles', userFilesController::class);
    Route::post('/filterFilesUser', 'App\Http\Controllers\User\userFilesController@getData');
    Route::get('/searchFilesUser', 'App\Http\Controllers\User\userFilesController@search');
});
