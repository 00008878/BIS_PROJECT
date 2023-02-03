<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;

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

Route::post('/login', [AuthController::class, 'signIn'])->name('auth.login');

Route::get('/test', [\App\Http\Controllers\TestController::class, 'test']);

Route::post('/post-test', [\App\Http\Controllers\TestController::class, 'postTest']);
