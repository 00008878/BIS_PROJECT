<?php

namespace App\UseCases\Applications;

use App\Models\File;
use App\Models\Client;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ApplicationProgress;
use App\Models\ClientApplicationInvite;
use App\UseCases\Gai\GetGaiReportUseCase;
use App\UseCases\Mib\GetMibReportUseCase;

class StoreApplicationFilesUseCase
{
    public function __construct(
        private GetMibReportUseCase $getMibReportUseCase,
        private GetGaiReportUseCase $getGaiReportUseCase,
    )
    {
    }

    public function execute(Request $request): array
    {
        foreach ($request->files as $file) {
            $fileName = time() . '.' . $file->guessExtension();

            $file->move(public_path('files'), $fileName);

            $file = new File();
            $file->client_id = $request->input('client_id');
            $file->application_id = $request->input('application_id');
            $file->file_name = $fileName;
            $file->file_type = $request->input('service_type');
            $file->save();
        }

        $application = Application::query()
            ->where('id', '=', $request->input('application_id'))
            ->first();

        $application->application_status = 'REVIEWING';

        $progress = ApplicationProgress::query()
            ->where('application_id', '=', $application->id)
            ->first();

        $progress->application_id = $application->id;
        $progress->reviewed_at = now();

        $invitation = ClientApplicationInvite::query()
            ->where('application_id', $application->id)
            ->first();

        if ($invitation !== null) {
            if ($application->client_id !== $invitation->from_client_id) {
                $invitation->active = false;
            }
        }

        DB::transaction(function () use ($application, $progress, $invitation) {
            $application->save();
            $progress->save();
            $invitation?->save();
        });

        $client = Client::query()
            ->with(['applications', 'passport', 'mib', 'gai'])
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($client->mib()->exists() === false) {
            $this->getMibReportUseCase->execute($client->passport->pinfl, $client->id);
        }

        if ($client->gai()->exists() === false) {
            $this->getGaiReportUseCase->execute($client->passport->pinfl, $client->id);
        }

        $invitations = ClientApplicationInvite::query()
            ->where('to_client_id', $client->id)
            ->get();

        return [
            'message' => 'Application Created Successfully',
            'client' => $client,
            'invitations' => $invitations,
        ];
    }
}
