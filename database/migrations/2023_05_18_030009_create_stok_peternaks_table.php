<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokPeternaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_peternaks', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')
                ->reference('id')
                ->on('barangs')
                ->onDelete('cascade');
            $table->unsignedBigInteger('peternak_id')
                ->reference('id')
                ->on('peternaks')
                ->onDelete('cascade');
            $table->integer('stok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_peternaks');
    }
}
