<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeTypeController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\CustomerPackController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HealthStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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



Route::group(['middleware' => ['check-login']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('employee_types', EmployeeTypeController::class);
    Route::resource('customer_types', CustomerTypeController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('customer_packs', CustomerPackController::class);
    Route::resource('health_statuses', HealthStatusController::class);

    Route::group(['prefix' =>'/users'] , function () {
        // Route::get('/create', 'CustomerController@create');
        // Route::get('/', 'App\Http\Controllers\UserController@index');
        // Route::get('/create', 'App\Http\Controllers\UserController@create')->name('users.create');
        Route::post('/create', 'App\Http\Controllers\UserController@store');
        Route::get('/editUser/{id}', 'App\Http\Controllers\UserController@edit')->name('editUser');
        Route::post('/updateUser','App\Http\Controllers\UserController@update')->name('updateUser');
        Route::get('/deleteUser/{id}','App\Http\Controllers\UserController@destroy')->name('deleteUser');
    });

    Route::group(['prefix' =>'/employees'] , function () {
        // Route::get('/create', 'CustomerController@create');
        Route::post('/create', 'App\Http\Controllers\EmployeeController@store');
        Route::get('/editEmployee/{id}', 'App\Http\Controllers\EmployeeController@edit')->name('editEmployee');
        Route::post('/updateEmployee','App\Http\Controllers\EmployeeController@update')->name('updateEmployee');
        Route::get('/deleteEmployee/{id}','App\Http\Controllers\EmployeeController@destroy')->name('deleteEmployee');
    });

    Route::group(['prefix' =>'/employee_types'] , function () {
        // Route::get('/create', 'CustomerController@create');
        Route::post('/create', 'App\Http\Controllers\EmployeeTypeController@store');
        Route::get('/editEmployeeType/{id}', 'App\Http\Controllers\EmployeeTypeController@edit')->name('editEmployeeType');
        Route::post('/updateEmployeeType','App\Http\Controllers\EmployeeTypeController@update')->name('updateEmployeeType');
        Route::get('/deleteEmployeeType/{id}','App\Http\Controllers\EmployeeTypeController@destroy')->name('deleteEmployeeType');
    });

    Route::group(['prefix' =>'/customer_types'] , function () {
        // Route::get('/create', 'CustomerController@create');
        Route::post('/create', 'App\Http\Controllers\CustomerTypeController@store');
        Route::get('/editCustomerType/{id}', 'App\Http\Controllers\CustomerTypeController@edit')->name('editCustomerType');
        Route::post('/updateCustomerType','App\Http\Controllers\CustomerTypeController@update')->name('updateCustomerType');
        Route::get('/deleteCustomerType/{id}','App\Http\Controllers\CustomerTypeController@destroy')->name('deleteCustomerType');
    });

    Route::group(['prefix' =>'/exercises'] , function () {
        Route::post('/create', 'App\Http\Controllers\ExerciseController@store');
        Route::get('/{id}', 'App\Http\Controllers\ExerciseController@show')->name('showExercise');
        Route::get('/editExercise/{id}', 'App\Http\Controllers\ExerciseController@edit')->name('editExercise');
        Route::post('/updateExercise','App\Http\Controllers\ExerciseController@update')->name('updateExercise');
        Route::get('/deleteExercise/{id}','App\Http\Controllers\ExerciseController@destroy')->name('deleteExercise');
    });

    Route::group(['prefix' =>'/customer_packs'] , function () {
        // Route::get('/create', 'CustomerController@create');
        Route::post('/create', 'App\Http\Controllers\CustomerPackController@store');
        Route::get('/editCustomerPack/{id}', 'App\Http\Controllers\CustomerPackController@edit')->name('editCustomerPack');
        Route::post('/updateCustomerPack','App\Http\Controllers\CustomerPackController@update')->name('updateCustomerPack');
        Route::get('/deleteCustomerPack/{id}','App\Http\Controllers\CustomerPackController@destroy')->name('deleteCustomerPack');
    });

    Route::group(['prefix' =>'/services'] , function () {
        // Route::get('/create', 'CustomerController@create');
        Route::post('/create', 'App\Http\Controllers\ServiceController@store');
        Route::get('/editService/{id}', 'App\Http\Controllers\ServiceController@edit')->name('editService');
        Route::post('/updateService','App\Http\Controllers\ServiceController@update')->name('updateService');
        Route::get('/deleteService/{id}','App\Http\Controllers\ServiceController@destroy')->name('deleteService');
    });

    Route::group(['prefix' =>'/health_statuses'] , function () {
        // Route::get('/create', 'CustomerController@create');
        Route::post('/create', 'App\Http\Controllers\HealthStatusController@store');
        Route::post('/showStatus/{id}', 'App\Http\Controllers\HealthStatusController@show')->name('showStatus');
        Route::get('/editStatus/{id}', 'App\Http\Controllers\HealthStatusController@edit')->name('editStatus');
        Route::post('/updateStatus','App\Http\Controllers\HealthStatusController@update')->name('updateStatus');
        Route::get('/deleteStatus/{id}','App\Http\Controllers\HealthStatusController@destroy')->name('deleteStatus');
    });

    Route::group(['prefix' => 'attendances'], function () {
        Route::get('/', [AttendanceController::class, 'index']);
    });

    Route::group(['prefix' => '/qr-code'], function() {
        Route::get('/', [QrCodeController::class, 'index'])->name('qr_code.index');
        Route::get('/checkin', [QrCodeController::class, 'store']);
    });



});

Route::get('login', [AuthController::class, 'getLogin'])->name('get-login');
Route::post('login', [AuthController::class, 'postLogin'])->name('post-login');
Route::get('login', [AuthController::class, 'getLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('fake-user', [AuthController::class, 'fakeUser']);