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
                                alt="article" class="img-fluid" /></div>
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
                                <a href="https://wa.me/083843063532?text=Kak%20saya%20mau%20pesen%20*1%20{{ $item->nama_barang }}*"
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

    $('.input-group').on('click', '.button-plus', function(e) {
        let increment = incrementValue(e);
        let pesan = `https://wa.me/083843063532?text=Kak%20saya%20mau%20pesen%20*${increment}%20{{ $item->nama_barang }}*`;
        $('#beli_sekarang').attr('href', pesan);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        let decrement = decrementValue(e);
        let pesan = `https://wa.me/083843063532?text=Kak%20saya%20mau%20pesen%20*${decrement}%20{{ $item->nama_barang }}*`;
        $('#beli_sekarang').attr('href', pesan);
    });

</script>
@endpush