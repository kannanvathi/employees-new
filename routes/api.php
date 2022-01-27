<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\EmployeeDataController;
use \App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/employees/countries', [EmployeeDataController::class, 'country']);
Route::get('/employees/{country}/states', [EmployeeDataController::class, 'state']);
Route::get('/employees/{state}/cities', [EmployeeDataController::class, 'city']);
Route::get('/employees/departments', [EmployeeDataController::class, 'department']);


Route::post('/employees/storeData', [EmployeeController::class, 'store']);
/*Route::get('/employees/index', [EmployeeController::class, 'index']);*/



Route::resource('employees', EmployeeController::class);


