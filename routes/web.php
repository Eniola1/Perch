<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Login;

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
    return view('home');
});

Route::post('/verify', [Login::class,"formSubmit"]);

Route::get("admin/", [Login::class,"admin"]);

Route::get('customers/', [Login::class,"customers"]);

Route::get('Ausers/', [Login::class,"Ausers"]);

Route::get('Aservice/', [Login::class,"Aservice"]);

Route::get('Aappointment/', [Login::class,"Aappointment"]);

Route::view("/check", "check");

Route::view("/vuser", "vuser");

Route::post('/c_user', [Login::class,"create_user"]);

Route::post('/c_service', [Login::class,"create_service"]);

Route::view("/vservice", "vservice");

Route::view("/vappointment", "vappointment");

Route::get("/appointment", [Login::class,"appointment"]);

Route::get("/Apnt", [Login::class,"Apnt"]);

Route::get("/services", [Login::class,"services"]);

