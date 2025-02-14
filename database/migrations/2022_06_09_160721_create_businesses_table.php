<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('comp_name')->nullable();
            $table->bigInteger('mc_num')->nullable();
            $table->string('dot_num')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('type')->default('BUSINESS');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('desire_name')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->string('image')->nullable();
            $table->longText('message')->nullable();
            $table->longText('website')->nullable();
            $table->string('status')->default(0);  //active = 0  un_active = 1
            $table->string('button_text')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token')->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
