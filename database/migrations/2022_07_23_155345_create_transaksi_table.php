<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('metode_pembayaran');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat_lengkap');
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('total_transaksi');
            $table->enum('status_transaksi', ['DIPROSES', 'DIKIRIM', 'BERHASIL', 'GAGAL']);
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
        Schema::dropIfExists('transaksi');
    }
}
