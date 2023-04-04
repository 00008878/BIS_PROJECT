<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\UseCases\Clients\ClientRegistrationsUseCase;

class ClientController extends Controller
{
    public function registrationView(): Factory|View|Application
    {
        return view('client-register');
    }

    /**
     * @throws Exception
     */
    public function registration(Request $request, ClientRegistrationsUseCase $clientRegistrationsUseCase): RedirectResponse
    {
        $client = $clientRegistrationsUseCase->execute($request);

        return redirect()->route('upload.passport', ['client_id' => $client->id]);
    }

    public function adminIndex(Request $request): Factory|View|Application
    {
        $clients = Client::query()
            ->filterRequest($request)
            ->get();

        return view('admin.clients', ['clients' => $clients]);
    }

    public function adminShowPassport(int $client_id): Factory|View|Application
    {
        $client = Client::query()
            ->with('passport')
            ->where('id', '=', $client_id)
            ->first();

        return view('admin.client-show-passport', ['client' => $client]);
    }

    public function adminShowApplications(int $client_id): Factory|View|Application
    {
        $client = Client::query()
            ->with(['applications' => fn($q) => $q->with('service')])
            ->where('id', '=', $client_id)
            ->first();

        return view('admin.client-show-applications', ['client' => $client]);
    }

    public function adminShowFiles(int $client_id): Factory|View|Application
    {
        $client = Client::query()
            ->with('files')
            ->where('id', '=', $client_id)
            ->first();

        return view('admin.client-show-files', ['client' => $client]);
    }

    public function adminShowMibReports(int $client_id): Factory|View|Application
    {
        $client = Client::query()
            ->with('mib')
            ->where('id', '=', $client_id)
            ->first();

        return view('admin.client-show-reports-mib', ['client' => $client]);
    }

    public function adminShowGaiReports(int $client_id): Factory|View|Application
    {
        $client = Client::query()
            ->with('gai')
            ->where('id', '=', $client_id)
            ->first();

        return view('admin.client-show-reports-gai', ['client' => $client]);
    }
}
