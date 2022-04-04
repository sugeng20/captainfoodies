@extends('layouts.frontend')

@section('content')
<!--body content wrap start-->
<div class="main">

    <!--our blog section start-->
    <section id="product mt-5" class="our-blog-section ptb-100">
        @foreach ($items as $item)
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-3 mt-5">
                        <h3>{{ $item->nama_kategori }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($item->barang as $barang)
                <div class="col-6 col-sm-3">
                    <a href="{{ route('detail-produk', $barang->slug) }}">
                        <div class="single-blog-card card border-0 shadow-sm">
                            <img src="{{ asset('backend/barang/' . $barang->foto_barang) }}"
                                class="card-img-top position-relative" alt="blog">
                            <div class="card-body">
                                <h5 class="h6 card-title">{{
                                    $barang->nama_barang }}</h5>
                                <h3 class="h5 card-title">Rp. {{ number_format($barang->harga_barang, 0, ',', '.') }}
                                </h3>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>
        </div>
        @endforeach
    </section>
    <!--our blog section end-->

</div>
<!--body content wrap end-->
@endsection