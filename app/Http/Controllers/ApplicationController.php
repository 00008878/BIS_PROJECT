<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Client;
use App\Models\Service;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ServiceRequirement;
use App\Models\ApplicationProgress;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class ApplicationController extends Controller
{
    public function applicationCreateView(Request $request): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::query()
            ->where('id', '=', (int) $request->input('service_id'))
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

        return view('application-create', [
            'service' => $service,
            'client' => $client,
            'application' => $application,
            'requirements' => $requirements,
        ]);
    }

    public function storeApplicationFiles(Request $request)
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
        $application->save();

        $progress = ApplicationProgress::query()
            ->where('application_id', '=', $application->id)
            ->first();

        $progress->application_id = $application->id;
        $progress->reviewed_at = now();
        $progress->save();

        return redirect()->route('home', ['message' => 'Application Created Successfully']);
    }

    public function adminIndex(): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $applications = Application::with(['client', 'service'])->get();

        return view('admin.applications', ['applications' => $applications]);
    }

    public function adminShow(int $application_id): Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $application = Application::query()
            ->with(['files', 'client', 'service'])
            ->where('id', '=', $application_id)
            ->first();

        return view('admin.application-show', ['application' => $application]);
    }

    public function adminChangeApplicationStatus(Request $request): RedirectResponse
    {
        $application = Application::query()->find($request->input('application_id'));

        $application->application_status = $request->input('application_status');
        $application->engaged_by_id = auth()->user()->id;
        $application->engaged_at = now();
        $application->save();

        $progress = ApplicationProgress::query()
            ->where('application_id', '=', $application->id)
            ->first();

        $progress->application_id = $application->id;

        if ($request->input('application_status') === 'APPROVE') {
            $progress->approved_at = now();
        } else {
            $progress->rejected_at = now();
        }

        $progress->save();

        return redirect()->back();
    }
}
