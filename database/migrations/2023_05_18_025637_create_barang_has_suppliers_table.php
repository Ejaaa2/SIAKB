<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangHasSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_has_suppliers', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')
                ->reference('id')
                ->on('barangs')
                ->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id')
                ->reference('id')
                ->on('suppliers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_has_suppliers');
    }
}
