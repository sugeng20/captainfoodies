@extends('layouts.backend')

@section('title')
Tambah Kategori
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('kategori.index') }}" class="btn btn-info mb-4">Kembali</a>
                <form action="{{ route('kategori.update', $item->id_kategori) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                placeholder="Nama kategori" value="{{ $item->nama_kategori }}" required>
                        </div>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@push('add-css-plugins')
@endpush

@push('add-js-plugins')
@endpush

@push('add-js')
@endpush