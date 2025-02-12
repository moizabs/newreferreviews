<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            
            $table->string('comp_name')->unique()->nullable();
            $table->bigInteger('comp_mc_num')->nullable();
            $table->string('comp_email')->unique()->nullable();
            $table->string('comp_phone')->nullable();
       
            $table->string('comp_city')->nullable();
            $table->string('comp_state')->nullable();
            $table->string('comp_address')->nullable();
            $table->string('comp_desire_name')->nullable();
            $table->string('comp_image')->nullable();
            $table->string('comp_message')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
