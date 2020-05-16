<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_list', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('trade_name')->unsigned();
            $table->foreign('trade_name')->references('id')->on('trade_models');
            $table->string('part_no', 500);
            $table->string('eqpt_description', 500);
            $table->integer('qty_received')->unsigned();
            $table->integer('qty_consumed')->unsigned()->nullable();
            $table->integer('qty_balance')->unsigned()->nullable();
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
        Schema::dropIfExists('stock_list');
    }
}
