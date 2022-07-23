<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Transaksi;
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
        $item = Barang::where('slug', $slug)->with('kategori')->firstOrFail();
        $items = Barang::where('id_kategori', $item->id_kategori)->with('kategori')->get();
        $no_whatsapp = User::find(1)->no_whatsapp;
        return view('pages.frontend.detail', compact('item', 'no_whatsapp', 'items'));
    }

    public function cart()
    {
        return view('pages.frontend.cart');
    }

    public function success()
    {
        return view('pages.frontend.success');
    }

    public function checkout(Request $request)
    {
        $data = $request->except(['id', 'qty']);
        $data['status_transaksi'] = 'DIPROSES';
        if($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = 'bukti_pembyaran_' . uniqid() . '_' . date("Ymd") . 
            '.'. $file->getClientOriginalExtension();
            $file->move('backend/bukti_pembayaran/', $fileName);
            $data['bukti_pembayaran'] = $fileName;
        }
        $transaksi = Transaksi::create($data);

        $jumlahCart = count($request->id);
        for($i = 1; $i <= $jumlahCart; $i++) {
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_barang' => $request->id[$i],
                'qty' => $request->qty[$i],
            ]);
        }

        return redirect('/success');
    }
}
