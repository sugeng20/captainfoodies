@extends('layouts.frontend')

@section('content')
<!--body content wrap start-->
<div class="main">

    <!--blog section start-->
    <div class="module ptb-100">
        <div class="container">
            <article class="post">
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

                                <a href="https://wa.me/083843063532?text=Kak%20saya%20mau%20pesen%20{{ $item->nama_barang }}"
                                    class="btn btn-lg btn-success"><i class="fab fa-whatsapp"></i> Beli
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