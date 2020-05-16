<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryandRectificationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entryand_rectification_models', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('trade_name')->unsigned();
            $table->foreign('trade_name')->references('id')->on('trade_models');
            $table->integer('type_name')->unsigned();
            $table->foreign('type_name')->references('id')->on('entry_type_models');
            $table->integer('ac_ser_no')->unsigned();
            $table->foreign('ac_ser_no')->references('id')->on('aircraft');
            $table->date('date_of_entry', 500);
            $table->string('description', 1000);
            $table->string('replacement_any', 1000)->nullable();
            $table->string('rect_description', 1000);
            $table->date('date_of_rect', 500);
            $table->string('remarks', 1000)->nullable();
            $table->string('workers', 1000);
            $table->string('supervisor', 1000);
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
        Schema::dropIfExists('entryand_rectification_models');
    }
}
