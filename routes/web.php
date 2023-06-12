<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\LogoutController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

Route::get('/a', function () {
    echo 'asdadssa';
    // dd(Auth::user());
    var_dump(Auth::user());
    // var_dump(session());
});
Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/register', function () {
    return view('register');
});
Route::get('/forget_pass', function () {
    return view('forget_pass');
});
Route::get('/main_user', [MainUserController::class, 'index'])->middleware('auth');
Route::post('/main_user_option', [MainUserController::class, 'option'])->middleware('auth');
// ->middleware('auth');
Route::get('/main_admin', function () {
    return view('main_admin');
});
Route::get('/cs_tracking', [TrackingController::class, 'index'])->middleware('auth');
Route::post('/cs_tracking_option', [TrackingController::class, 'option'])->middleware('auth');
Route::get('/cs_upload', function () {
    return view('cs_upload');
})->middleware('auth');

Route::post('/login_form', [loginController::class, 'login']);
Route::post('/register_form', [registerController::class, 'register']);
Route::get('/users/import', [ImportController::class, 'show']);
Route::post('/users/import', [ImportController::class, 'store']);

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect('/login');
});
