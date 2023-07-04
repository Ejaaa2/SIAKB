<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id')
                ->reference('id')
                ->on('barangs')
                ->onDelete('cascade');
            $table->unsignedBigInteger('peternak_id')
                ->reference('id')
                ->on('peternaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id')
                ->reference('id')
                ->on('suppliers')
                ->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengirimans');
    }
}
