@extends('layouts.frontend')

@section('content')
<!--body content wrap start-->
<div class="main">

    <section class="mt-5 pt-100">
        <div class="container mt-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('backend/sliders/sliders-1.png') }}"
                            style="border-radius: 20px" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('backend/sliders/sliders-2.png') }}" alt="Second slide"
                            style="border-radius: 20px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('backend/sliders/sliders-3.png') }}" alt="Third slide"
                            style="border-radius: 20px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!--our blog section start-->
    <section id="product" class="our-blog-section mt-5">
        @foreach ($items as $item)
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-3">
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