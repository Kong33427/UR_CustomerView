<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;

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
Route::get('/main_user', function () {
    return view('main_user');
});
Route::get('/main_admin', function () {
    return view('main_admin');
});
Route::get('/cs_tracking', function () {
    return view('cs_tracking');
});
Route::get('/cs_upload', function () {
    return view('cs_upload');
});

Route::post('/login_form', [loginController::class,'login']);
Route::post('/register_form', [registerController::class,'register']);