@extends('layouts.theme')

@section('title')
    Data Tamu
@endsection
@section('title_crumb2')
    Data Tamu
@endsection
@section('tambah_breadcrumb')
    <li class="breadcrumb-item">Buku Tamu</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <!-- pesan alert -->
            @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            <div class="row justify-content-between mt-3 mb-3">
                <div class="col-4">
                    <a class="btn btn-success" href="{{ url('buku_tamu/create') }}">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>

                <div class="col-4 text-right">
                    <!-- Button to Open the Modal -->
                    <a class="btn bg-primary" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-print"></i> Print</a>
                    <a class="btn bg-danger" data-toggle="modal" data-target="#myModalDownload">
                        <i class="fa fa-file-pdf"></i> pdf</a>
                </div>

                <div class="col-4">
                    <form method="GET" action="{{ 'buku_tamu' }}" class="form-inline">
                        <input type="search" name="keyword" value="" class="form-control mr-sm-2" placeholder="Seacrh .." />
                        <button class="btn bg-gray-dark disabled color-palette" type="submit">Search <i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>No Token</th>
                        <th>Jumlah Tamu</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Instansi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Tujuan Instansi</th>
                        <th>Tujuan Pegawai</th>
                        <th>Tujuan Kunjungan</th>
                        <th>Status</th>
                        <th colspan="2">Approval</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku_tamus as $key => $value)
                        <tr>
                            <td>{{ $buku_tamus->firstItem() + $key }}</td>
                            <td>{{ $value->no_token }}</td>
                            <td>{{ $value->jumlah_tamu }}</td>
                            <td>{{ $value->nama_tamu }}</td>
                            <td>{{ $value->alamat }}</td>
                            <td>{{ $value->nama_instansi }}</td>
                            <td>{{ $value->tanggal_kunjungan }}</td>
                            <td>{{ $value->sunrise }}</td>
                            <td>{{ $value->instansi->nama_instansi }}</td>
                            <td>{{ $value->tujuan_pegawai }}</td>
                            <td>{{ $value->tujuan_kunjungan }}</td>
                            <td class="text-center"><span
                                    class="badge badge-{{ $value->status == 'Acc' ? 'success' : ($value->status == 'Tolak' ? 'danger' : 'primary') }}">{{ $value->status }}</span>
                            </td>
                            <td><a href="{{ url('approved', $value->id) }}"><span
                                        class="badge badge-success">Acc</span></a></td>
                            <td><a href="{{ url('canceled', $value->id) }}"><span
                                        class="badge badge-danger">Tolak</span></a></td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ url('buku_tamu/' . $value->id) }}"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-success btn-sm mt-1"
                                    href="{{ url('buku_tamu/' . $value->id . '/edit') }}"> <i class="fa fa-edit"></i>
                                </a>
                                @can('roles')
                                <a class="btn btn-danger btn-sm mt-1 delete" data-id="{{ $value->id }}" type="submit"> <i class="fa fa-trash-alt"></i>
                                </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-left mt-3">
                Showing
                {{ $buku_tamus->firstItem() }}
                to
                {{ $buku_tamus->lastItem() }}
                of
                {{ $buku_tamus->total() }}
                entries
            </div>
            <div class="float-right mt-3">
                {{ $buku_tamus->links('vendor.pagination.custom') }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@push('title_modal')
    Laporan Data Tamu
@endpush
@push('button')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/bukutamu_print_data/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"
            target="_blank" class="btn btn-primary" target="_blank"> Cetak </a>
    </div>
@endpush

@push('button_download')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/bukutamu_exportpdf/'+ document.getElementById('awal').value + '/' + document.getElementById('akhir').value"
            class="btn btn-primary"> Download </a>
    </div>
@endpush
@push('jquery')
    <script>
        $('.delete').click(function() {
            var userid = $(this).attr('data-id');
            swal({
                    title: "Yakin?",
                    text: "Apakah yakin akan menghapus data ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "delete_bukutamu/" + userid + ""
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
    </script>
@endpush
