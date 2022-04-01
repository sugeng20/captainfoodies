@extends('layouts.frontend')

@section('content')
<!--body content wrap start-->
<div class="main">

    <!--header section start-->
    <section class="hero-section ptb-100 background-img"
        style="background: url('img/hero-bg-2.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">{{ $item->nama_barang }}</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="{{ url('/') }}#product">Produk</a>
                                </li>
                                <li class="list-inline-item breadcrumb-item active">{{ $item->nama_barang }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->

    <!--blog section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><img src="{{ asset('backend/barang/' . $item->foto_barang) }}"
                                alt="article" class="img-fluid" /></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h1 class="post-title">{{
                                    $item->nama_barang }}</h1>
                                <ul class="post-meta">
                                    <li>November 18, 2016</li>
                                    <li>In <a href="#">Branding</a>, <a href="#">Design</a></li>
                                    <li><a href="#">3 Comments</a></li>
                                </ul>
                            </div>
                            <div class="post-content">
                                {!! $item->deskripsi !!}

                                <a href="https://wa.me/083843063532?text=Kak%20saya%20mau%20pesen%20{{ $item->nama_barang }}"
                                    class="btn btn-lg btn-success"><i class="fab fa-whatsapp"></i> Beli
                                    Sekarang</a>
                            </div>

                        </div>
                    </article>
                    <!-- Post end-->


                </div>

                @include('includes.sidebar-frontend')
            </div>
        </div>
    </div>
    <!--blog section end-->

</div>
<!--body content wrap end-->
@endsection