<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('comp_id');
            $table->string('title');
            $table->longText('review');
            $table->double('rating')->default(0);
            $table->integer('status')->default(0);  //published = 0,  //un_published =1
            $table->longText('reply')->nullable();
            $table->integer('like')->default(1);    //like = 0 for  //dislikes = 1
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
        Schema::dropIfExists('reviews');
    }
}
