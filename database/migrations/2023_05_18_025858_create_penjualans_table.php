<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('pembeli_id')
                ->reference('id')
                ->on('pembelis')
                ->onDelete('cascade');
            $table->double('jumlahbeli');
            $table->double('hargaterkini');
            $table->bigInteger('grandtotal');
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
        Schema::dropIfExists('penjualans');
    }
}
