<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <td>UUID</td>
            <td>{{ $item->uuid }}</td>
        </tr>
        <tr>
            <td>Metode Pembayaran</td>
            <td>{{ $item->metode_pembayaran }}</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>{{ $item->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $item->email }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>{{ $item->no_hp }}</td>
        </tr>
        <tr>
            <td>Alamat Lengkap</td>
            <td>{{ $item->alamat_lengkap }}</td>
        </tr>
        @if($item->metode_pembayaran == 'TRANSFER BANK')
        <tr>
            <td>Bukti Pembayaran</td>
            <td>
                <a href="{{ asset('backend/bukti_pembayaran/' . $item->bukti_pembayaran) }}" class="btn btn-primary"
                    target="_blank">Lihat Bukti Pembayaran</a>
            </td>
        </tr>
        @endif
        <tr>
            <td>Total Transaksi</td>
            <td>
                Rp.
                {{ number_format($item->total_transaksi, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Status Transaksi</td>
            <td>
                @if($item->status_transaksi == 'DIPROSES')
                <div class="badge badge-info">{{ $item->status_transaksi }}</div>
                @elseif($item->status_transaksi == 'DIKIRIM')
                <div class="badge badge-warning">{{ $item->status_transaksi }}</div>
                @elseif($item->status_transaksi == 'BERHASIL')
                <div class="badge badge-success">{{ $item->status_transaksi }}</div>
                @elseif($item->status_transaksi == 'GAGAL')
                <div class="badge badge-danger">{{ $item->status_transaksi }}</div>
                @endif
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Foto Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)


        <tr>
            <td>
                <img src="{{ asset('backend/barang/' . $item->barang->foto_barang) }}" alt="" width="100">
            </td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>
                {{ number_format($item->barang->harga_barang, 0, ',', '.') }}
                x
                {{ $item->qty }}
            </td>
            <td>
                {{ number_format($item->qty * $item->barang->harga_barang, 0, ',', '.') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>