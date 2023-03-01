<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceRequirement;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class ServicesController extends Controller
{
    public function servicesView(): Factory|View|Application
    {
        $services = Service::query()
            ->get();

        return view('services', ['services' => $services]);
    }

    public function servicesShowView(int $id): Factory|View|Application
    {
        $service = Service::query()->find($id);

        $requirements = ServiceRequirement::query()
            ->where('service_id', '=', $id)
            ->get();

        return view('services-show', ['service' => $service, 'requirements' => $requirements]);
    }
}
