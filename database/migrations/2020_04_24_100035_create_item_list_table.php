<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_no', 300);
            $table->string('name', 500);
            $table->string('to_ref', 500);
            $table->string('item_class', 500);
            $table->string('item_range', 500);
            $table->string('qty_demand', 500);
            $table->string('yearof_demand', 500);
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
        Schema::dropIfExists('item_list');
    }
}
