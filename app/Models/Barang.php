<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    public $timestamps = false;

    protected $fillable = [
        'nama_barang', 'foto_barang', 'deskripsi', 'slug', 'harga_barang', 'id_kategori', 'id_admin'
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id_kategori', 'id_kategori');
    }    
}
