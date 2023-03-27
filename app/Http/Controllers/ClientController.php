<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\UseCases\Gai\GetGaiReportUseCase;
use App\UseCases\Mib\GetMibReportUseCase;
use Illuminate\Contracts\Foundation\Application;

class ClientController extends Controller
{
    public function registrationView(): Factory|View|Application
    {
        return view('client-register');
    }

    /**
     * @throws Exception
     */
    public function registration(Request $request, GetMibReportUseCase $getMibReportUseCase, GetGaiReportUseCase $getGaiReportUseCase): RedirectResponse
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->patronymic = $request->input('patronymic');
        $client->phone = $request->input('phone');
        $client->client_status = 'NEW';
        $client->birthdate = $request->input('birthdate');
        $client->gender = $request->input('gender');
        $client->user_id = Auth::id();

        $passport = new Passport();
        $passport->serial_number = $request->input('serial_number');
        $passport->pinfl = $request->input('pinfl');
        $passport->name = $client->name;
        $passport->surname = $client->surname;
        $passport->patronymic = $client->patronymic;
        $passport->birth_date = $client->birthdate;
        $passport->gender = $client->gender;
        $passport->issue_date = $request->input('issue_date');
        $passport->expiry_date = $request->input('expiry_date');
        $passport->address = $request->input('address');
        $passport->region = $request->input('region');
        $passport->city_name = $request->input('city_name');
        $passport->nationality_name = $request->input('nationality_name');
        $passport->type = $request->input('type');

        DB::transaction(function () use ($client, $passport) {
            $client->save();

            $passport->client_id = $client->id;
            $passport->save();
        });

        $getMibReportUseCase->execute($passport->pinfl, $passport->client_id);

        $getGaiReportUseCase->execute($passport->pinfl, $passport->client_id);

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
