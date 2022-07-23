@extends('layouts.backend')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $kategori }}</h3>

                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
            <a href="{{ url('kategori') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $barang }}</h3>

                <p>Barang</p>
            </div>
            <div class="icon">
                <i class="fas fa-archive"></i>
            </div>
            <a href="{{ url('barang') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $transaksi }}</h3>

                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="fas fa-calculator"></i>
            </div>
            <a href="{{ url('transaksi') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Rp. {{ number_format($pendapatan, 0, ',', '.') }},-</h3>

                <p>Pendapatan</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill"></i>
            </div>
            <a href="{{ url('transaksi') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
@endsection