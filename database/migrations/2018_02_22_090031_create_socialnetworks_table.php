<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialnetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialnetworks', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('facebook')->nullable;
            $table->string('twitter')->nullable;
            $table->string('instagram')->nullable;
            $table->string('pinterest')->nullable;
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialnetworks');
    }
}
