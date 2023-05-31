<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeternaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peternaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama',45);
            $table->string('alamat',45);
            $table->string('kecamatan',45);
            $table->string('nohp',45);
            $table->string('jaminan',45);
            $table->string('fotojaminan');
            $table->string('bank',45);
            $table->string('norek',45);
            $table->string('fotosyarat');
            $table->date('pengirimanselanjutnya');
            $table->string('wilayah',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peternaks');
    }
}
