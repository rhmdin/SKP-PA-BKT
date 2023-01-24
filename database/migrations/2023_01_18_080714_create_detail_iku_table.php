<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailIkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_iku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_iku');
            $table->foreign('id_iku')->references('id')->on('iku');
            $table->text('tahun');
            $table->text('target');
            $table->text('pihak_satu');
            $table->text('pihak_dua');
            $table->date('tanggal_ditetapkan');
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
        Schema::dropIfExists('detail_iku');
    }
}