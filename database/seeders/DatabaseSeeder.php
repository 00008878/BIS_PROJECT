<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Passport;
use Illuminate\Database\Seeder;
use App\Models\ServiceRequirement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Client::factory(20)->create();
        Passport::factory(20)->create();
        Service::factory(15)->create();
        ServiceRequirement::factory(25)->create();
    }
}
