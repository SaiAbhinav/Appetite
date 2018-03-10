<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('bill_id')->unsigned();
                $table->string('transaction_type')->nullable();
                $table->integer('wallet_id')->unsigned();
                $table->float('amount_paid',8,2)->unsigned();
                $table->timestamps();

                $table->foreign('bill_id')->references('id')->on('bills');
                //$table->foreign('wallet_id')->references('id')->on('wallets');           
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
