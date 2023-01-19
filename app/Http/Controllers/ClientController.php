<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Passport;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function registration(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->surname = $request->input('name');
        $client->patronymic = $request->input('name');
        $client->phone = $request->input('name');
        $client->client_status = $request->input('name');
        $client->birthdate = $request->input('name');
        $client->gender = $request->input('name');
        $client->save();

        $passport = new Passport();
        $passport->client_id = $client->id;
        $passport->serial_number = $request->input('serial_number');
        $passport->pinfl = $request->input('serial_numer');
        $passport->name = $request->input('serial_numer');
        $passport->surname = $request->input('serial_numer');
        $passport->patronymic = $request->input('serial_numer');
        $passport->birth_date = $request->input('serial_numer');
        $passport->gender = $request->input('serial_numer');
        $passport->issue_date = $request->input('serial_numer');
        $passport->expiry_date = $request->input('serial_numer');
        $passport->address = $request->input('serial_numer');
        $passport->region = $request->input('serial_numer');
        $passport->city_name = $request->input('serial_numer');
        $passport->nationality_name = $request->input('serial_numer');
        $passport->type = $request->input('serial_numer');
        $passport->save();
    }
}
