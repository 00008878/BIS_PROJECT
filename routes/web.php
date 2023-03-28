<?php

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ClientApplicationInvite;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\AdminAuthMiddleware;
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
    return view('test');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'signIn'])->name('login');

Route::get('/login', [AuthController::class, 'signInView']);

Route::post('/register', [AuthController::class, 'signUp'])->name('signup');

Route::get('/register', [AuthController::class, 'signUpView'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/home', function (Request $request) {
        $client = Client::query()
            ->with('applications')
            ->where('user_id', auth()->user()->id)
            ->first();

        $invitations = ClientApplicationInvite::query()
            ->where('to_client_id', $client->id)
            ->get();

        if ($request->query('message')) {
            return view('home', ['message' => $request->query('message'), 'client' => $client, 'invitations' => $invitations]);
        }

        return view('home', ['client' => $client, 'invitations' => $invitations]);
    })->name('home');

    Route::get('/passport-register', [ClientController::class, 'registrationView']);

    Route::post('/passport-register', [ClientController::class, 'registration'])->name('client.register');

    Route::get('/upload-passport/{client_id}', [FileController::class, 'uploadPassportView'])->name('upload.passport');

    Route::post('/upload-passport/{client_id}', [FileController::class, 'checkIdentification'])->name('client.upload-passport');

    Route::get('/services/{id}', [ServicesController::class, 'servicesShowView'])->name('services.show');

    Route::get('/services', [ServicesController::class, 'servicesView'])->name('services.all');

    Route::post('/application-create', [ApplicationController::class, 'applicationCreateView'])->name('application.create');

    Route::post('/application-invite', [ApplicationController::class, 'applicationSendInvitation'])->name('application.invite');

    Route::get('/application-invite/{application_id}', [ApplicationController::class, 'applicationLinkFromInvitation'])->name('application.session');

    Route::post('/application-store', [ApplicationController::class, 'storeApplicationFiles'])->name('application.store');

    Route::middleware(AdminAuthMiddleware::class)->prefix('admin')->group(function () {
        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientController::class, 'adminIndex'])->name('admin.clients.index');
            Route::get('/{client_id}/passport', [ClientController::class, 'adminShowPassport'])->name('admin.client.show.passport');
            Route::get('/{client_id}/applications', [ClientController::class, 'adminShowApplications'])->name('admin.client.show.applications');
            Route::get('/{client_id}/files', [ClientController::class, 'adminShowFiles'])->name('admin.client.show.files');
            Route::get('/{client_id}/reports/mib', [ClientController::class, 'adminShowMibReports'])->name('admin.client.show.reports.mib');
            Route::get('/{client_id}/reports/gai', [ClientController::class, 'adminShowGaiReports'])->name('admin.client.show.reports.gai');
        });

        Route::get('applications', [ApplicationController::class, 'adminIndex'])->name('admin.applications.index');
        Route::get('applications/{application_id}', [ApplicationController::class, 'adminShow'])->name('admin.application.show');
        Route::post('applications/status/change', [ApplicationController::class, 'adminChangeApplicationStatus'])->name('application.status.change');
    });
});
