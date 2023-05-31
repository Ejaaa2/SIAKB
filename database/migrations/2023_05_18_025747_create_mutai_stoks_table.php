<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutaiStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutai_stoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peternakasl_id')
                ->reference('id')
                ->on('peternaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('peternaktjn_id')
                ->reference('id')
                ->on('peternaks')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('barang_id')
                ->reference('id')
                ->on('barangs')
                ->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('stokbergerak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutai_stoks');
    }
}
