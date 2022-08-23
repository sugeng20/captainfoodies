@extends('layouts.frontend')

@section('title')
Cart
@endsection

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Keranjang Belanja</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">

        <div class="row">
            <div class="col-lg-12" id="pesanBarang">
                <div class="cart-table mb-5">
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th class="p-name text-center">Nama Barang</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="shoppingCart">
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-dark btn-lg" type="button" id="btnPesanBarang">PESAN BARANG</button>
            </div>

            <div id="konfirmasiPesanan" class="col-lg-12" hidden>
                <form enctype="multipart/form-data" action="{{ url('checkout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="user-checkout">

                                <div class="form-group">
                                    <label for="namaLengkap">Nama lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaHelp"
                                        placeholder="Masukan Nama" name="nama_lengkap" required>
                                </div>
                                <div class="form-group">
                                    <label for="namaLengkap">Email Address</label>
                                    <input type="email" class="form-control" id="emailAddress"
                                        aria-describedby="emailHelp" placeholder="Masukan Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="namaLengkap">No. HP</label>
                                    <input type="text" class="form-control" id="noHP" aria-describedby="noHPHelp"
                                        placeholder="Masukan No. HP" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamatLengkap">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamatLengkap" rows="3" name="alamat_lengkap"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="namaLengkap" style="font-weight: bold; font-size: 18px;">Metode
                                        Pembayaran</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="metode_pembayaran"
                                            id="transferBank" value="TRANSFER BANK" checked>
                                        <label class="form-check-label" for="transferBank">
                                            Transfer Bank
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="cod"
                                            value="COD">
                                        <label class="form-check-label" for="cod">
                                            Bayar Langsung ditempat (COD)
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group transfer">
                                    <label for="buktiPembayaran">Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="bukti_pembayaran" id="buktiPembayaran"
                                        aria-describedby="buktiPembayaranHelp" required>
                                </div>
                                <input type="hidden" name="uuid" id="uuid" value="" required>
                                <input type="hidden" name="total_transaksi" id="totalTransaksi" value="" required>
                                <div id="formBarang"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="proceed-checkout">
                                        <ul>
                                            <li class="subtotal">ID Transaction <span id="idTransaction"></span></li>
                                            <li class="subtotal mt-3">Total Biaya <span id="totalBiaya"></span></li>
                                            <li class="subtotal mt-3 transfer">Bank Transfer <span>BRI</span></li>
                                            <li class="subtotal mt-3 transfer">No. Rekening <span>2208 1996 1507</span>
                                            </li>
                                            <li class="subtotal mt-3 transfer">Bank Transfer <span>Mandiri</span></li>
                                            <li class="subtotal mt-3 transfer">No. Rekening <span>2208 1996 1403</span>
                                            </li>
                                            <li class="subtotal mt-3 transfer">Nama Penerima <span>Gina Noviani</span>
                                            </li>
                                        </ul>
                                        <button disabled type="submit" id="buttonPesan"
                                            class="proceed-btn btn-block">KONFRIMASI PEMBAYARAN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection

@push('add-script')
<script>
    var totalCart = 0;
    if(keranjangUser.length > 0) {
        $('#buttonPesan').prop('disabled', false);
    }

    $('#pesanBarang').click(function() {
        $('#konfirmasiPesanan').prop('hidden', false);
        $('#pesanBarang').prop('hidden', true);
    })

    var hitung = 0;
    keranjangUser.map(function(data) {
        hitung++;
        $('#shoppingCart').append(`
            <tr>
                <td class="cart-pic first-row">
                    <img src="${data.photo}" />
                </td>
                <td class="cart-title first-row text-center">
                    <h5>${data.name}</h5>
                </td>
                <td class="p-price first-row">Rp. ${formatRupiah(data.price)} x ${data.qty}</td>
                <td class="delete-item"><a style="cursor: pointer;" onclick="removeItem(${data.id})"><i class="material-icons">
                            close
                        </i></a></td>
            </tr>
        `);

        $('#formBarang').append(`
            <input type="hidden" name="id[${hitung}]" value="${data.id}">
            <input type="hidden" name="qty[${hitung}]" value="${data.qty}">
        `);

        totalCart += data.price * data.qty;
    })

    let angkaRandom = Math.floor(Math.random() * 100000);
    $('#idTransaction').html(`#CF${angkaRandom}`);
    $('#uuid').val(`#CF${angkaRandom}`)
    $('#totalBiaya').html(`Rp. ${formatRupiah(totalCart)}`);
    $('#totalTransaksi').val(totalCart);
    $('#cod').click(function() {
        $('.transfer').prop('hidden', true)
        $('#buktiPembayaran').prop('required', false);
        $('#buttonPesan').html('Lanjutkan Pesanan');
    })
    $('#transferBank').click(function() {
        $('.transfer').prop('hidden', false)
        $('#buktiPembayaran').prop('required', true);
        $('#buttonPesan').html('Konfirmasi Pembayaran');
    })
    $('#buttonPesan').click(function() {
        localStorage.removeItem("keranjangUser");
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    })
</script>
@endpush