<?php

namespace App\UseCases\Applications;

use App\Models\Client;
use App\Models\Application;
use App\Models\ClientApplicationInvite;
use App\DTO\Applications\ApplicationSendInviteDTO;

class ApplicationSendInvitationUseCase
{
    public function execute(ApplicationSendInviteDTO $inviteDTO): array
    {
        $client = Client::query()
            ->select('clients.*')
            ->join('passports', 'clients.id', '=', 'passports.client_id')
            ->where('passports.pinfl', '=', $inviteDTO->getPinfl())
            ->first();

        $invitation = new ClientApplicationInvite();
        $invitation->application_id = $inviteDTO->getApplicationId();
        $invitation->from_client_id = $inviteDTO->getClientId();
        $invitation->to_client_id = $client->id;
        $invitation->active = true;
        $invitation->save();

        $application = Application::query()->find($inviteDTO->getApplicationId());

        $service = $application->service;

        $requirements = $service->service_requirements;

        return [
            'service' => $service,
            'client' => $client,
            'application' => $application,
            'requirements' => $requirements,
        ];
    }
}
