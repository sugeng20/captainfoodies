@extends('layouts.backend')

@section('title')
Kategori
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
                @if (Session::get('status'))
                <div class="my-3 alert alert-success" role="alert">
                    <strong>{{ Session::get('status') }}</strong>

                </div>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $no++ }}</td>

                            <td>
                                {{ $item->nama_kategori }}
                            </td>

                            <td>
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning"
                                    title="Edit"><i class="fa fa-edit"></i></a>

                                <form class="d-inline" action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda Yakin?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Hapus" class="btn btn-danger"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
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
@endpush

@push('add-js')
<script>
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