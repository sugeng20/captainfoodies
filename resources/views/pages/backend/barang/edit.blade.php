@extends('layouts.backend')

@section('title')
Edit Barang
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('barang.index') }}" class="btn btn-info mb-4"><i
                        class=" nav-icon fas fa-arrow-circle-left"></i> Kembali</a>
                <form action="{{ route('barang.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
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
                            <img src="{{ asset('backend/barang/' . $item->foto_barang) }}" alt="" width="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang" value="{{ $item->nama_barang }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-sm-2 col-form-label">Kategori Barang</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                <option value="">- PILIH KATEGORI -</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $item->id_kategori == $category->id ? 'selected'
                                    : '' }}>{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control ckeditor"
                                required>{{ $item->deskripsi }}</textarea>
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