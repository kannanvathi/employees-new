<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\ChangePasswordController;
use \App\Http\Controllers\CountryController;
use \App\Http\Controllers\StatesController;
use \App\Http\Controllers\CityController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\RolesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/countries', CountryController::class);
Route::resource('states', StatesController::class);
Route::resource('cities', CityController::class);
Route::resource('users', UsersController::class);


Route::group(['middleware' => ['auth']], function() {

    Route::resource('departments', DepartmentController::class);
    Route::resource('roles', RolesController::class);
});
/*Route::get('employees', function () {
    return view('index');
});*/


Route::post('/send-mail', [HomeController::class, 'send_mail']);


Route::post('/send-email-pdf', [HomeController::class, 'send_pdf']);
/*Route::post('/get-cities', [App\Http\Controllers\UsersController::class, 'getCities']);*/


Route::get('{any}', function () {
    return view('employees.index');
})->where('any', '.*');

Route::post('users/{user}/change-password', [ChangePasswordController::class, 'changePassword'])->name('users.change.password');




