<form action="{{ route('transaksi.update', $item->id_transaksi) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status_transaksi" id="status" class="form-control">
            <option value="DIPROSES" {{ $item->status_transaksi == 'DIPROSES' ? 'selected' : '' }}>DIPROSES</option>
            <option value="DIKIRIM" {{ $item->status_transaksi == 'DIKIRIM' ? 'selected' : '' }}>DIKIRIM</option>
            <option value="BERHASIL" {{ $item->status_transaksi == 'BERHASIL' ? 'selected' : '' }}>BERHASIL</option>
            <option value="GAGAL" {{ $item->status_transaksi == 'GAGAL' ? 'selected' : '' }}>GAGAL</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>