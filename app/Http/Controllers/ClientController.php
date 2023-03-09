<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class ClientController extends Controller
{
    public function registrationView(): Factory|View|Application
    {
        return view('client-register');
    }

    public function registration(Request $request)
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
        $client->save();

        $passport = new Passport();
        $passport->client_id = $client->id;
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
        $passport->save();

        return redirect()->route('upload.passport', ['client_id' => $client->id]);
    }

    public function adminIndex(): Factory|View|Application
    {
        $clients = Client::all();

        return view('admin.clients', ['clients' => $clients]);
    }

    public function adminShow(int $client_id): Factory|View|Application
    {
        $client = Client::query()
            ->with(['passport', 'files', 'mib', 'applications' => fn ($q) => $q->with('service')])
            ->where('id', '=', $client_id)
            ->first();

        return view('admin.client-show', ['client' => $client]);
    }
}
