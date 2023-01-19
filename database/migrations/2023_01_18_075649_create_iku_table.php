<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sasaran');
            $table->foreign('id_sasaran')->references('id')->on('sasaran');
            $table->enum('jenis',['u','p']);
            $table->longText('isi_iku');
            $table->text('penanggung_jawab');
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
        Schema::dropIfExists('iku');
    }
}