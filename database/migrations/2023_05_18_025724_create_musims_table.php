<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengiriman_id')
                ->reference('id')
                ->on('pengirimans')
                ->onDelete('cascade');
            $table->string('musim',45);
            $table->string('status',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musims');
    }
}
