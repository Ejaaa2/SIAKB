<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderKebutuhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_kebutuhans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_order');
            $table->string('tipe_order');
            $table->unsignedBigInteger('id_peternak')
            ->reference('id')
            ->on('peternaks')
            ->onDelete('cascade');
            $table->unsignedBigInteger('id_user')
            ->reference('id')
            ->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('id_barang')
            ->reference('id')
            ->on('barangs')
            ->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('deskripsi');
            $table->string('status_order');
            $table->date('tanggal_order');
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
        Schema::dropIfExists('order_kebutuhans');
    }
}
