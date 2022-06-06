<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Kategori::with('barang')->where('nama_kategori', '!=', 'Non Kategori')->get();
        return view('pages.frontend.home', compact('items'));
    }

    public function beranda()
    {
        $items = Kategori::with('barang')->where('nama_kategori', '!=', 'Non Kategori')->get();
        return view('pages.frontend.beranda', compact('items'));
    }

    public function detail($slug)
    {
        $item = Barang::where('slug', $slug)->firstOrFail();
        $no_whatsapp = User::find(1)->no_whatsapp;
        return view('pages.frontend.detail', compact('item', 'no_whatsapp'));
    }
}
