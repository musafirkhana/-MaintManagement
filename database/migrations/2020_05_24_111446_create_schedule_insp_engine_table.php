<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleInspEngineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_insp_engine', function (Blueprint $table) {
            $table->integer('ac_ser_no')->unsigned();
            $table->foreign('ac_ser_no')->references('id')->on('aircraft');
            $table->integer('insp_type')->unsigned();
            $table->foreign('insp_type')->references('id')->on('insp_type');
            $table->integer('insp_freq')->unsigned();
            $table->foreign('insp_freq')->references('id')->on('insp_type');
            $table->double('due_hrs_lt_eng')->unsigned();
            $table->double('due_hrs_rt_eng')->unsigned();
            $table->double('left_hrs_lt_eng')->unsigned()->nullable();
            $table->double('left_hrs_rt_eng')->unsigned()->nullable();
            $table->integer('insp_carr_status')->unsigned()->nullable();
            $table->date('insp_carr_date', 500);
            $table->string('remarks', 1000)->nullable();
            $table->timestamps();
            $table->primary(array('ac_ser_no','insp_type','insp_freq'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_insp_engine');
    }
}
