<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_barang_masuk_id');
            $table->foreign('transaksi_barang_masuk_id')->references('id')->on('transaksi_barang_masuk')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
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
        Schema::dropIfExists('transaksi_barang_keluar');
    }
};
