<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->longText('message')->nullable();
            $table->string('message_date')->nullable();
            $table->string('message_time')->nullable();
            $table->tinyInteger('status')->nullable(); //0=sent; 1=deliver; 2=company 
            $table->string('message_by')->nullable(); 
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
        Schema::dropIfExists('chats');
    }
}
