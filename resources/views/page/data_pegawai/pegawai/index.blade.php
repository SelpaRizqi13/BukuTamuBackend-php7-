@extends('layouts.theme')

@section('title')
    Data Pegawai
@endsection
@section('title_crumb2')
    Data Pegawai
@endsection
@section('tambah_breadcrumb')
    <li class="breadcrumb-item">Pegawai</li>
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
                    <a class="btn btn-success" href="{{ url('pegawai/create') }}">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>

                {{-- <div class="col-4 text-right">
                    <!-- Button to Open the Modal -->
                    <a class="btn bg-primary" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-print"></i> Print</a>
                    <a class="btn bg-danger" data-toggle="modal" data-target="#myModalDownload">
                        <i class="fa fa-file-pdf"></i> pdf</a>
                </div> --}}

                <div class="col-4">
                    <form method="GET" action="{{ 'pegawai' }}" class="form-inline">
                        <input type="search" name="keyword" value="" class="form-control mr-sm-2"
                            placeholder="Seacrh .." />
                        <button class="btn bg-gray-dark disabled color-palette" type="submit">Search <i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <table id="example2" class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $key => $value)
                        <tr>
                            <td class="text-center">{{ $pegawais->firstItem() + $key }}</td>
                            <td>{{ $value->nama_pegawai }}</td>
                            <td>{{ $value->jabatan }}</td>
                            <td>{{ $value->instansi->nama_instansi }}</td>
                            <td width="130px" class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ url('pegawai/' . $value->id) }}"><i
                                        class="fa fa-eye"></i> </a>
                                <a class="btn btn-success btn-sm" href="{{ url('pegawai/' . $value->id . '/edit') }}"> <i
                                        class="fa fa-edit"></i>
                                </a>
                                @can('roles')
                                    <a class="btn btn-danger btn-sm delete" data-id="{{ $value->id }}" type="submit"> <i
                                            class="fa fa-trash-alt"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left mt-3">
                Showing
                {{ $pegawais->firstItem() }}
                to
                {{ $pegawais->lastItem() }}
                of
                {{ $pegawais->total() }}
                entries
            </div>
            <div class="float-right mt-3">
                {{ $pegawais->links('vendor.pagination.custom') }}
            </div>

        </div>
        <!-- /.card-body -->


    </div>
    <!-- /.card -->



    </section>
@endsection

@push('title_modal')
    Laporan Data Pegawai
@endpush
@push('button')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/pegawai_print_data/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"
            target="_blank" class="btn btn-primary" target="_blank"> Cetak </a>
    </div>
@endpush
@push('button_download')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/pegawai_exportpdf/'+ document.getElementById('awal').value + '/' + document.getElementById('akhir').value"
            target="_blank" class="btn btn-primary"> Download </a>
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
                        window.location = "delete_pegawai/" + userid + ""
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
        // $(function() {
        //     $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": true,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });
    </script>
@endpush
