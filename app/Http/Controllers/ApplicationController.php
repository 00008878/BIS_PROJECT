<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class ApplicationController extends Controller
{
    public function applicationCreateView(Request $request): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::query()
            ->where('id', '=', (int) $request->input('service_id'))
            ->first();

        $client = Client::query()
            ->where('user_id', '=', (int) $request->input('user_id'))
            ->first();

        $application = new Application();
        $application->client_id = $client->id;
        $application->service_type = $service->id;
        $application->application_status = 'NEW';
        $application->save();

        return view('application-create', [
            'service' => $service,
            'client' => $client,
            'application' => $application,
        ]);
    }
}
