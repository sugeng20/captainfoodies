@extends('layouts.backend')

@section('title')
Tambah Barang
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('barang.index') }}" class="btn btn-info mb-4"><i
                        class=" nav-icon fas fa-arrow-circle-left"></i>
                    Kembali</a>
                @if ($errors->any())
                <div class="row my-3">
                    <div class="col-sm-12">
                        <div class="alert alert-danger dark" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Foto Barang</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                        name="foto_barang">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                                placeholder="Harga Barang" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control ckeditor"
                                required></textarea>
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
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('add-js-plugins')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush

@push('add-js')
<script>
    $(function () {
        bsCustomFileInput.init();
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
</script>
@endpush