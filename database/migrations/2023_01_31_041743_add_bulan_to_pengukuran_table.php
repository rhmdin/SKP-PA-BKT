<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBulanToPengukuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengukuran', function (Blueprint $table) {
            $table->text('realisasi')->after('sumber_data');
            $table->text('capaian')->after('realisasi');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengukuran', function (Blueprint $table) {
            $table->dropColumn('realisasi');
            $table->dropColumn('capaian');
            
        });
    }
}