<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\MainUserController;
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
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forget_pass', function () {
    return view('forget_pass');
});
Route::get('/main_user', [MainUserController::class,'index']);
Route::get('/main_admin', function () {
    return view('main_admin');
});
Route::get('/cs_tracking',[TrackingController::class,'index']
);
Route::get('/cs_upload', function () {
    return view('cs_upload');
});

Route::post('/login_form', [loginController::class,'login']);
Route::post('/register_form', [registerController::class,'register']);
Route::get('/users/import', [ImportController::class,'show']);
Route::post('/users/import',[ImportController::class,'store']);
