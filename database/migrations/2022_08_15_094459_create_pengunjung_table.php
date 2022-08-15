<?php

use App\Models\Transaksi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id('id_pengunjung');
            $table->foreignIdFor(Transaksi::class, 'id_transaksi')->index();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat_lengkap');
            $table->string('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('pengunjung');
    }
}
