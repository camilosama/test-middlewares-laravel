<?php

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
# ADD PROTECT MIDDLEWARE BEFORE READ THE ROUTES
Route::middleware(['verified', 'checkLastSession', 'storeOriginSessionCookie','twoFactorAuth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/sesiones', function () {
    return view('sesiones');
});
Route::get('/verificacion', function () {
    return view('verificacion');
});


