<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcCompTbotsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_comp_tbotso', function (Blueprint $table) {
            $table->integer('ac_ser_no')->unsigned();
            $table->foreign('ac_ser_no')->references('id')->on('aircraft');
            $table->double('ac_tso_hrs')->unsigned();
            $table->double('ac_tbo_hrs')->unsigned();
            $table->double('eng_lt_tso_hrs')->unsigned();
            $table->double('eng_rt_tso_hrs')->unsigned();
            $table->double('eng_lt_tbo_hrs')->unsigned();
            $table->double('eng_rt_tbo_hrs')->unsigned();
            $table->double('prop_lt_tso_hrs')->unsigned();
            $table->double('prop_rt_tso_hrs')->unsigned();
            $table->double('prop_lt_tbo_hrs')->unsigned();
            $table->double('prop_rt_tbo_hrs')->unsigned();
            $table->string('remarks', 1000)->nullable();
            $table->timestamps();
            $table->primary(array('ac_ser_no'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ac_comp_tbotso');
    }
}
