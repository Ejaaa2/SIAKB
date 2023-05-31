<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_panens', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('peternak_id')
                ->reference('id')
                ->on('peternaks')
                ->onDelete('cascade');
            $table->double('jumlah_bobot');
            $table->string('platno',45);
            $table->string('namapembeli',45);
            $table->date('tanggal');
            $table->integer('jumlahayam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_panens');
    }
}
