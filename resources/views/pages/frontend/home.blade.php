@extends('layouts.frontend')

@section('content')
<!--body content wrap start-->
<div class="main">

    <!--our blog section start-->
    <section id="product" class="our-blog-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-5">
                        <h2>Produk Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($items as $item)
                <div class="col-md-3">
                    <a href="{{ route('detail-produk', $item->slug) }}">
                        <div class="single-blog-card card border-0 shadow-sm">
                            <img src="{{ asset('backend/barang/' . $item->foto_barang) }}"
                                class="card-img-top position-relative" alt="blog">
                            <div class="card-body">
                                <h5 class="h6 card-title">{{
                                    $item->nama_barang }}</h5>
                                <h3 class="h5 card-title">Rp. 50.000</h3>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--our blog section end-->

</div>
<!--body content wrap end-->
@endsection