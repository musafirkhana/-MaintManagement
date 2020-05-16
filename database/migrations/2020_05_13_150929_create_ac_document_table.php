<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_document', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500);
            $table->string('remarks', 1000)->nullable();
            $table->string('file_name', 500);
            $table->string('file_name_original', 500);
            $table->string('uploader_name', 500);
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
        Schema::dropIfExists('ac_document');
    }
}
