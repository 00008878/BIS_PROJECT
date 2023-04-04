<?php

namespace App\UseCases\Applications;

use App\Models\Client;
use App\Models\Service;
use App\Models\Application;
use App\Models\ServiceRequirement;
use App\Models\ApplicationProgress;

class GetApplicationsCreateViewUseCase
{
    public function execute(int $service_id): array
    {
        $service = Service::query()
            ->where('id', '=', $service_id)
            ->first();

        $client = Client::query()
            ->where('user_id', '=', auth()->user()->id)
            ->first();

        $application = Application::query()
            ->where('client_id', '=', $client->id)
            ->where('application_status', '=', 'NEW')
            ->first();

        if ($application === null) {
            $application = new Application();
            $application->client_id = $client->id;
            $application->service_type = $service->id;
            $application->application_status = 'NEW';
            $application->save();

            $progress = new ApplicationProgress();
            $progress->application_id = $application->id;
            $progress->application_created_at = now();
            $progress->save();
        }

        $requirements = ServiceRequirement::query()
            ->where('service_id', '=', $service->id)
            ->get();

        return [
            'service' => $service,
            'client' => $client,
            'application' => $application,
            'requirements' => $requirements,
        ];
    }
}
