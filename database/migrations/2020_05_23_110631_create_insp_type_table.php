<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insp_type', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('insp_group', 500);
            $table->string('insp_type', 500);
            $table->string('insp_freq', 100);
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
        Schema::dropIfExists('insp_type');
    }
}
