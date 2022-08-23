<?php

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->foreignIdFor(User::class, 'id_admin')->index();
            $table->string('foto_barang');
            $table->string('nama_barang');
            $table->integer('harga_barang');
            $table->foreignIdFor(Kategori::class, 'id_kategori')->index();
            $table->longText('deskripsi');
            $table->string('slug')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
