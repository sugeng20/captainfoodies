<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\NotifikasiTransaksiEmail;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.backend.transaksi.index', [
            'items' => Transaksi::orderBy('id_transaksi', 'DESC')->with('pengunjung')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.backend.transaksi.show', [
            'item' => Transaksi::with('pengunjung')->findOrFail($id),
            'items' => DetailTransaksi::where('id_transaksi', $id)->with('barang')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.backend.transaksi.edit', [
            'item' => Transaksi::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Transaksi::findOrFail($id)->update(['status_transaksi' => $request->status_transaksi]);
        $transaksi = Transaksi::find($id);
        Mail::to($transaksi->email)->send(new NotifikasiTransaksiEmail($id));
        return redirect()->route('transaksi.index')->with('status', 'Berhasil Update Status Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::with('detail_transaksi')->findOrFail($id)->delete();
        return redirect()->route('transaksi.index')->with('status', 'Berhasil Hapus Transaksi');
    }
}
