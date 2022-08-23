@extends('layouts.backend')

@section('title')
Transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (Session::get('status'))
                <div class="my-3 alert alert-success" role="alert">
                    <strong>{{ Session::get('status') }}</strong>
                </div>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
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
                                {{ $item->pengunjung->nama_lengkap }}
                            </td>
                            <td>
                                {{ $item->metode_pembayaran }}
                            </td>
                            <td>
                                @if($item->status_transaksi == 'DIPROSES')
                                <div class="badge badge-info">{{ $item->status_transaksi }}</div>
                                @elseif($item->status_transaksi == 'DIKIRIM')
                                <div class="badge badge-warning">{{ $item->status_transaksi }}</div>
                                @elseif($item->status_transaksi == 'BERHASIL')
                                <div class="badge badge-success">{{ $item->status_transaksi }}</div>
                                @elseif($item->status_transaksi == 'GAGAL')
                                <div class="badge badge-danger">{{ $item->status_transaksi }}</div>
                                @endif
                            </td>
                            <td>
                                <a href="#mymodal" data-remote="{{ route('transaksi.show', $item->id_transaksi) }}"
                                    data-toggle="modal" data-target="#mymodal"
                                    data-title="Detail Transaksi {{ $item->uuid }}" class="btn btn-info"
                                    title="Detail Transaksi" target="_blank"><i class="fa fa-eye"></i></a>
                                <a href="#myModalEdit" data-remote="{{ route('transaksi.edit', $item->id_transaksi) }}"
                                    data-toggle="modal" data-target="#myModalEdit"
                                    data-title="Edit Transaksi {{ $item->uuid }}" class="btn btn-warning"
                                    title="Edit"><i class="fa fa-edit"></i></a>

                                <form class="d-inline" action="{{ route('transaksi.destroy', $item->id_transaksi) }}"
                                    method="POST" onsubmit="return confirm('Apakah Anda Yakin?')">
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
                            <th>Nama Barang</th>
                            <th>Photo</th>
                            <th>Kategori</th>
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
    jQuery(document).ready(function($) {
        $('#mymodal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);

            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });

        $('#myModalEdit').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);

            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
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

<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endpush