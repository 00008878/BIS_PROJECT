<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\DTO\Applications\ApplicationSendInviteDTO;
use App\UseCases\Applications\StoreApplicationFilesUseCase;
use App\UseCases\Applications\ChangeApplicationStatusUseCase;
use App\UseCases\Applications\ApplicationSendInvitationUseCase;
use App\UseCases\Applications\GetApplicationsCreateViewUseCase;
use Illuminate\Contracts\Foundation\Application as ApplicationIlluminate;

class ApplicationController extends Controller
{
    public function applicationCreateView(Request $request, GetApplicationsCreateViewUseCase $getApplicationsCreateViewUseCase): Factory|View|ApplicationIlluminate
    {
        $result = $getApplicationsCreateViewUseCase->execute((int) $request->input('service_id'));

        return view('application-create', $result);
    }

    public function applicationSendInvitation(Request $request, ApplicationSendInvitationUseCase $applicationSendInvitationUseCase): ApplicationIlluminate|Factory|View
    {
       $result = $applicationSendInvitationUseCase->execute(ApplicationSendInviteDTO::fromArray([
           $request->input('pinfl'),
           $request->input('application_id'),
           $request->input('client_id'),
       ]));

        return view('application-create', $result);
    }

    public function applicationLinkFromInvitation(int $application_id): Factory|View|ApplicationIlluminate
    {
        $application = Application::query()->find($application_id);

        $service = $application->service;

        $client = $application->client;

        $requirements = $service->service_requirements;

        return view('application-create', [
            'service' => $service,
            'client' => $client,
            'application' => $application,
            'requirements' => $requirements,
        ]);
    }

    public function storeApplicationFiles(Request $request, StoreApplicationFilesUseCase $storeApplicationFilesUseCase): RedirectResponse
    {
        $result = $storeApplicationFilesUseCase->execute($request);

        return redirect()->route('home', $result);
    }

    public function adminIndex(): Factory|View|ApplicationIlluminate
    {
        $applications = Application::with(['client', 'service'])->get();

        return view('admin.applications', ['applications' => $applications]);
    }

    public function adminShow(int $application_id): Factory|View|ApplicationIlluminate
    {
        $application = Application::query()
            ->with(['files', 'client', 'service'])
            ->where('id', '=', $application_id)
            ->first();

        return view('admin.application-show', ['application' => $application]);
    }

    public function adminChangeApplicationStatus(Request $request, ChangeApplicationStatusUseCase $changeApplicationStatusUseCase): RedirectResponse
    {
        $changeApplicationStatusUseCase->execute($request->input('application_id'), $request->input('application_status'));

        return redirect()->back();
    }
}
