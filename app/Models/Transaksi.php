<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table ='transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'uuid', 'metode_pembayaran', 'nama_lengkap', 'email', 'no_hp',
        'alamat_lengkap', 'bukti_pembayaran', 'total_transaksi', 'status_transaksi'
    ];

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function pengunjung()
    {
        return $this->hasOne(Pengunjung::class, 'id_pengunjung', 'id_pengunjung');
    }

}
