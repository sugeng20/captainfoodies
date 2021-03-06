@extends('layouts.frontend')

@push('add-css')
<style>
    .input-group input {
        border: 1px solid #eeeeee;
        box-sizing: border-box;
        margin: 0;
        outline: none;
        padding: 10px;
    }

    .input-group input[type="button"] {
        -webkit-appearance: button;
        cursor: pointer;
    }

    .input-group input::-webkit-outer-spin-button,
    .input-group input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    .input-group {
        clear: both;
        margin: 15px 0;
        position: relative;
    }

    .input-group input[type='button'] {
        background-color: #eeeeee;
        min-width: 38px;
        width: auto;
        transition: all 300ms ease;
    }

    .input-group .button-minus,
    .input-group .button-plus {
        font-weight: bold;
        height: 38px;
        padding: 0;
        width: 38px;
        position: relative;
    }

    .input-group .quantity-field {
        position: relative;
        height: 38px;
        left: -6px;
        text-align: center;
        width: 62px;
        display: inline-block;
        font-size: 13px;
        margin: 0 0 5px;
        resize: vertical;
    }

    .button-plus {
        left: -13px;
    }

    .input-group input[type="number"] {
        -moz-appearance: textfield;
        -webkit-appearance: none;
    }
</style>
@endpush

@section('content')
<!--body content wrap start-->
<div class="main">

    <!--blog section start-->
    <div class="module ptb-100">
        <div class="container">
            <article class="post mt-5">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <!-- Post-->
                        <div class="post-preview"><img src="{{ asset('backend/barang/' . $item->foto_barang) }}"
                                alt="article" class="img-fluid" id="zoom_01"
                                data-zoom-image="{{ asset('backend/barang/' . $item->foto_barang) }}" /></div>
                        <!-- Post end-->
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="sidebar-right pl-4">
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h1 class="post-title">{{
                                        $item->nama_barang }}</h1>
                                    <ul class="post-meta">
                                        <li>7 Berhasil Terjual</li>
                                    </ul>
                                    <h1 class="post-title">Rp. {{ number_format($item->harga_barang, 0, ',', '.') }}
                                    </h1>
                                </div>
                            </div>
                            <div class="post-content">
                                {!! $item->deskripsi !!}
                                <div class="input-group">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" step="1" max="" value="1" name="quantity"
                                        class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>
                                <h5 class="post-title">Sub Total : Rp. <span id="sub_total">{{
                                        number_format($item->harga_barang, 0, ',', '.') }}</span></h5>
                                <a href="https://wa.me/{{ $no_whatsapp }}?text=Kak%20saya%20mau%20pesen%20*1%20{{ $item->nama_barang }}*\nberikut adalah alamat saya \nAlamat Lenkap:\n"
                                    class="btn btn-lg btn-success" id="beli_sekarang" target="_blank"><i
                                        class="fab fa-whatsapp"></i>
                                    Beli
                                    Sekarang</a>
                            </div>

                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <!--blog section end-->

</div>
<!--body content wrap end-->
@endsection

@push('add-script')
<script src="{{ asset('frontend/js/jquery.elevatezoom.js') }}"></script>
<script>
    $('#zoom_01').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
    });
    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
        var counter;

        if (!isNaN(currentVal)) {
            var counter = currentVal + 1;
            parent.find('input[name=' + fieldName + ']').val(counter);
        } else {
            var counter = 0;
            parent.find('input[name=' + fieldName + ']').val(0);
        }
        
        return counter;
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
        var counter = 0;

        if (!isNaN(currentVal) && currentVal > 0) {
            var counter = currentVal - 1;
            parent.find('input[name=' + fieldName + ']').val(counter);
        } else {
            var counter = 0;
            parent.find('input[name=' + fieldName + ']').val(counter);
        }

        return counter;
    }

    function formatRupiah(angka, prefix){
        var number_string   = String(angka).replace(/[^,\d]/g, '').toString(),
        split   		    = number_string.split(','),
        sisa     		    = split[0].length % 3,
        rupiah     		    = split[0].substr(0, sisa),
        ribuan     		    = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }

    var harga_barang = {{ $item->harga_barang }};
    var sub_total = {{ $item->harga_barang }};

    $('.input-group').on('click', '.button-plus', function(e) {
        let increment = incrementValue(e);
        let pesan = `https://wa.me/{{ $no_whatsapp }}?text=Kak%20saya%20mau%20pesen%20*${increment}%20{{ $item->nama_barang }}*`;
        $('#beli_sekarang').attr('href', pesan);
        $('#sub_total').html(formatRupiah(sub_total += harga_barang))
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        let decrement = decrementValue(e);
        let pesan = `https://wa.me/{{ $no_whatsapp }}?text=Kak%20saya%20mau%20pesen%20*${decrement}%20{{ $item->nama_barang }}*`;
        $('#beli_sekarang').attr('href', pesan);
        $('#sub_total').html(formatRupiah(sub_total -= harga_barang))
    });

</script>
@endpush