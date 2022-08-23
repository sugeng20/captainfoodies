<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\NotifikasiTransaksiEmail;
use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Pengunjung;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $pengunjung                     = new Pengunjung;
        $pengunjung->nama_lengkap       = $request->nama_lengkap;
        $pengunjung->email              = $request->email;
        $pengunjung->no_hp              = $request->no_hp;
        if($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = 'bukti_pembyaran_' . uniqid() . '_' . date("Ymd") . 
            '.'. $file->getClientOriginalExtension();
            $file->move('backend/bukti_pembayaran/', $fileName);
            $pengunjung->bukti_pembayaran = $request->bukti_pembayaran;
        }
        $pengunjung->alamat_lengkap      = $request->alamat_lengkap;
        $pengunjung->save();

        $transaksi                      = new Transaksi;
        $transaksi->id_pengunjung       = $pengunjung->id_pengunjung;
        $transaksi->uuid                = $request->uuid;
        $transaksi->metode_pembayaran   = $request->metode_pembayaran;
        $transaksi->total_transaksi     = $request->total_transaksi;
        $transaksi->status_transaksi    = 'DIPROSES';
        $transaksi->save();
        $jumlahCart = count($request->id);

        for($i = 1; $i <= $jumlahCart; $i++) {
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_barang' => $request->id[$i],
                'qty' => $request->qty[$i],
            ]);
        }

        Mail::to($pengunjung->email)->send(new NotifikasiTransaksiEmail($transaksi->id_transaksi));

        return redirect('/success');
    }
}
