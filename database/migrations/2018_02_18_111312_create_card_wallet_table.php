<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wallet_id')->unsigned();
            $table->integer('card_id')->unsigned();
            $table->float('amount_added',8,2)->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_wallet');
    }
}
