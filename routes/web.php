<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\ApplicationController;

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
    Route::get('/home', function (Request $request) {
        if ($request->query('message')) {
            return view('home', ['message' => $request->query('message')]);
        }

        return view('home');
    })->name('home');

    Route::get('/passport-register', [ClientController::class, 'registrationView']);

    Route::post('/passport-register', [ClientController::class, 'registration'])->name('client.register');

    Route::get('/upload-passport/{client_id}', [FileController::class, 'uploadPassportView'])->name('upload.passport');

    Route::post('/upload-passport/{client_id}', [FileController::class, 'checkIdentification'])->name('client.upload-passport');

    Route::get('/services/{id}', [ServicesController::class, 'servicesShowView'])->name('services.show');

    Route::get('/services', [ServicesController::class, 'servicesView'])->name('services.all');

    Route::post('/application-create', [ApplicationController::class, 'applicationCreateView'])->name('application.create');

    Route::post('/application-store', [ApplicationController::class, 'storeApplicationFiles'])->name('application.store');

    Route::prefix('admin')->group(function () {
        Route::get('clients', [ClientController::class, 'adminIndex']);
        Route::get('applications', [ApplicationController::class, 'adminIndex']);
        Route::get('clients/{client_id}', [ClientController::class, 'adminShow'])->name('admin.client.show');
        Route::get('applications/{application_id}', [ApplicationController::class, 'adminShow'])->name('admin.application.show');
        Route::post('applications/status/change', [ApplicationController::class, 'adminChangeApplicationStatus'])->name('application.status.change');
    });
});
