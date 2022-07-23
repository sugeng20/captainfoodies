<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table ='transaksi';

    protected $fillable = [
        'uuid', 'metode_pembayaran', 'nama_lengkap', 'email', 'no_hp',
        'alamat_lengkap', 'bukti_pembayaran', 'total_transaksi', 'status_transaksi'
    ];
}
