<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->unique()->index();
            $table->string('serial_number')->unique();
            $table->unsignedBigInteger('pinfl')->unique();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();

            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();

            $table->date('issue_date');
            $table->date('expiry_date');

            $table->string('address');
            $table->string('region');

            $table->string('city_name');
            $table->string('nationality_name');

            $table->string('type')->default('Passport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passports');
    }
}
