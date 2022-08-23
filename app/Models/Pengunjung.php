<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    protected $primaryKey = 'id_pengunjung';

    public $timestamps = false;

    protected $fillable = [
        'id_pengunjung', 'id_transaksi', 'nama_lengkap', 'email', 'no_hp', 'alamat_lengkap', 'bukti_pembayaran'
    ];

}
