<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('comp_id');
            $table->string('pickup_loca');
            $table->string('dilvery_loca');
            $table->string('veh_year');
            $table->string('veh_make');
            $table->string('veh_model');
            $table->tinyinteger('trailer_types' )->default(0); //open == 1  // enclose==0
            $table->tinyinteger('veh_condition')->default(1); //notRunning == 0 // running == 1
            $table->tinyinteger('status')->default(1); //Active == 0 // Deactive == 1
            $table->longText('message')->nullable();
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
        Schema::dropIfExists('request_prices');
    }
}
