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
        Schema::create('transaksi_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_umkm_id');
            $table->foreign('barang_umkm_id')->references('id')->on('barang_umkm')->onUpdate('cascade')->onDelete('cascade');
            // $table->integer('harga');
            $table->integer('jumlah');
            $table->date('tanggal_kadaluarsa');
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
        Schema::dropIfExists('transaksi_barang_masuk');
    }
};
