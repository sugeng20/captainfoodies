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
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="{{ asset('backend/barang/' . $item->foto_barang) }}"
                                alt="" />
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active"
                                    data-imgbigurl="{{ asset('backend/barang/' . $item->foto_barang) }}">
                                    <img src="{{ asset('backend/barang/' . $item->foto_barang) }}" alt="" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{ $item->kategori->nama_kategori }}</span>
                                <h3>{{ $item->nama_barang }}</h3>
                            </div>
                            <div class="pd-desc">
                                {!! $item->deskripsi !!}
                                <div class="input-group">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" step="1" max="" value="1" name="quantity"
                                        class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>
                                <h4 id="sub_total">{{
                                    number_format($item->harga_barang, 0, ',', '.') }}</h4>
                            </div>
                            <div class="quantity">
                                <a href="{{ url('cart') }}" class="primary-btn pd-cart">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($items as $barang)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{ asset('backend/barang/' . $barang->foto_barang) }}" alt="" />
                        <ul>
                            <li class="w-icon active">
                                <a href="#"><i class="icon_bag_alt"></i></a>
                            </li>
                            <li class="quick-view"><a href="{{ route('detail-produk', $barang->slug) }}">+ Quick
                                    View</a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{ $item->kategori->nama_kategori }}</div>
                        <a href="{{ route('detail-produk', $barang->slug) }}">
                            <h5>{{
                                $barang->nama_barang }}</h5>
                        </a>
                        <div class="product-price">
                            Rp. {{ number_format($barang->harga_barang, 0, ',', '.') }}
                            <span>Rp. {{ number_format($barang->harga_barang * 2, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->
@endsection

@push('add-script')
<script>
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