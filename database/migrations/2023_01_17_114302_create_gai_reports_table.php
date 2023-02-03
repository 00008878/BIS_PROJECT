<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaiReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gai_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('license_plate_num');
            $table->string('car_mark');
            $table->string('car_color');
            $table->string('car_model');
            $table->string('reg_no');
            $table->integer('year_of_manufacture');
            $table->date('tech_inspect_date_start');
            $table->date('tech_inspect_date_end');
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
        Schema::dropIfExists('gai_reports');
    }
}
