<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAndMarkCombinedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_mark', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('card_id')->unsigned();
           // $table->foreign('card_id')->references('id')->on('cards');

            $table->integer('mark_id')->unsigned();
         //  $table->foreign('mark_id')->references('id')->on('marks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_mark');
    }
}
