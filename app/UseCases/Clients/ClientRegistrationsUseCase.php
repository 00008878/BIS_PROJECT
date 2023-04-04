<?php

namespace App\UseCases\Clients;

use App\Models\Client;
use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Gai\GetGaiReportUseCase;
use App\UseCases\Mib\GetMibReportUseCase;

class ClientRegistrationsUseCase
{
    public function __construct(
        private GetMibReportUseCase $getMibReportUseCase,
        private GetGaiReportUseCase $getGaiReportUseCase,
    )
    {
    }

    public function execute(Request $request): Client
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

        $this->getMibReportUseCase->execute($passport->pinfl, $passport->client_id);

        $this->getGaiReportUseCase->execute($passport->pinfl, $passport->client_id);

        return $client;
    }
}
