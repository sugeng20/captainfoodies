@extends('layouts.frontend')

@section('title')
Home
@endsection

@section('content')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="img/hero-rengginang.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>SNACKS</span>
                        <h1>Rengginang Geginang</h1>
                        <p>
                            kini hadir dengan sedikit lebih modern dan praktis,dengan tetap mempertahankan rasa gurih
                            atau manis(pilihan varian)
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="img/hero-baksoaci.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>FOODS</span>
                        <h1>Bakso Aci</h1>
                        <p>
                            Kemasan lebih elegan, proses uji lab lolos pirt dan halal, ketahanan baso aci jauh lebih
                            lama karena menggunakan sistem
                            vacum seal
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Hero Section End -->

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        @foreach ($items as $item)
        <div class="row">
            <div class="col-12">
                <h2 class="mt-5">{{ $item->nama_kategori }}</h2>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="product-slider owl-carousel">
                    @foreach ($item->barang as $barang)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ asset('backend/barang/' . $barang->foto_barang) }}" alt="" />
                            <ul>
                                <li class="w-icon active">
                                    <a style="cursor: pointer;"
                                        onclick="saveKeranjang('{{ $barang->id }}', '{{ $barang->nama_barang }}', {{ $barang->harga_barang }}, '{{ asset('backend/barang/' . $barang->foto_barang) }}', false)"><i
                                            class="icon_bag_alt"></i></a>
                                </li>
                                <li class="quick-view">
                                    <a href="{{ route('detail-produk', $barang->slug) }}">+ Lihat Detail</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $item->nama_kategori }}</div>
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
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Women Banner Section End -->


<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-1.png" alt="" />
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-2.png" alt="" />
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-3.png" alt="" />
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-4.png" alt="" />
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-5.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->
@endsection