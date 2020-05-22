<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlgHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flg_hours', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('ac_ser_no')->unsigned();
            $table->foreign('ac_ser_no')->references('id')->on('aircraft');
            $table->date('flg_date', 500);
            $table->string('month', 100);
            $table->string('year', 100);
            $table->string('pilot', 500);
            $table->string('co_pilot', 500);
            $table->integer('msn_type')->unsigned();
            $table->foreign('msn_type')->references('id')->on('msn_table');
            $table->integer('flg_hours')->unsigned();
            $table->integer('total_ldg')->unsigned();
            $table->integer('cycle_completed')->unsigned();
            $table->string('remarks', 1000)->nullable();
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
        Schema::dropIfExists('flg_hours');
    }
}
