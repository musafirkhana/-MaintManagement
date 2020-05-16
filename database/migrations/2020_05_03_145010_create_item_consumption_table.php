<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemConsumptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_consumption', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('trade_name')->unsigned();
            $table->foreign('trade_name')->references('id')->on('trade_models');
            $table->string('part_no', 500);
            $table->string('eqpt_description', 500);
            $table->date('consumption_date', 500)->nullable();
            $table->integer('consumption_ac_ser')->unsigned()->nullable();
            $table->foreign('consumption_ac_ser')->references('id')->on('aircraft');
            $table->integer('qty_consumed')->unsigned()->nullable();
            $table->string('item_tbo', 500);
            $table->string('item_service_life', 500);
            $table->string('item_location', 500);
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('class_list');
            $table->string('remarks', 1000);
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
        Schema::dropIfExists('item_consumption');
    }
}
