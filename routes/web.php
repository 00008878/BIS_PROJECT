<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\ServiceTypeController;

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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'signIn'])->name('login');

Route::get('/login', [AuthController::class, 'signInView']);

Route::post('/register', [AuthController::class, 'signUp'])->name('signup');

Route::get('/register', [AuthController::class, 'signUpView']);

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/passport-register', [ClientController::class, 'registrationView']);

    Route::post('/passport-register', [ClientController::class, 'registration'])->name('client.register');

    Route::get('/upload-passport/{client_id}', [FileController::class, 'uploadPassportView'])->name('upload.passport');

    Route::post('/upload-passport/{client_id}', [FileController::class, 'checkIdentification'])->name('client.upload-passport');

    Route::get('/services', [ServiceTypeController::class, 'servicesView'])->name('services');
});
