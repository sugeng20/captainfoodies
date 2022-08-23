<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $primaryKey = 'id_detail_transaksi';

    public $timestamps = false;

    protected $fillable = [
        'id_transaksi', 'id_barang', 'qty'
    ];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id_barang', 'id_barang');
    }
}
