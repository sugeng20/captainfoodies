<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('pages.backend.barang.index', [
            'items' => Barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.barang.create', [
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_barang'       => 'required',
            'nama_barang'       => 'required|max:255',
            'harga_barang'      => 'required|max:11',
            'id_kategori'       => 'required|max:11',
            'deskripsi'         => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_barang);
        if($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $fileName = 'barang_' . uniqid() . '_' . date("Ymd") . 
            '.'. $file->getClientOriginalExtension();
            $file->move('backend/barang/', $fileName);
            $data['foto_barang'] = $fileName;
        }

        Barang::create($data);
        return redirect()->route('barang.index')->with('status', 'Berhasil Menambahkan Barang Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.backend.barang.edit', [
            'categories' => Kategori::all(),
            'item' => Barang::findOrFail($id)
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
        $request->validate([
            'nama_barang'       => 'required|max:255',
            'harga_barang'      => 'required|max:11',
            'id_kategori'       => 'required|max:11',
            'deskripsi'         => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_barang);
        if($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $fileName = 'barang_' . uniqid() . '_' . date("Ymd") . 
            '.'. $file->getClientOriginalExtension();
            $file->move('backend/barang/', $fileName);
            $data['foto_barang'] = $fileName;
        }

        Barang::findOrFail($id)->update($data);
        return redirect()->route('barang.index')->with('status', 'Berhasil Mengubah Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang.index')->with('status', 'Berhasil Menghapus Barang');
    }
}
