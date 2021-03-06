<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang', 'foto_barang', 'deskripsi', 'slug', 'harga_barang', 'id_kategori'
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }    
}
