@extends('layouts.theme')

@section('title')
    Data Instansi
@endsection
@section('title_crumb2')
    Data Pegawai
@endsection
@section('tambah_breadcrumb')
    <li class="breadcrumb-item">Instansi</li>
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
                    <a class="btn btn-success" href="{{ url('instansi/create') }}">
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
                    <form method="GET" action="{{ 'instansi' }}" class="form-inline">
                        <input type="search" name="keyword" value="{{ $keyword }}" class="form-control mr-sm-2"
                            placeholder="Seacrh .." />
                        <button class="btn bg-gray-dark disabled color-palette" type="submit">Search <i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <table id="example2" class="table table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Instansi</th>
                        <th>Lokasi Lantai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instansis as $key => $value)
                        <tr>
                            <td class="text-center">{{ $instansis->firstItem() + $key }}</td>

                            <td>{{ $value->nama_instansi }}</td>
                            <td>{{ $value->lantai }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm"  href="{{ url('instansi/' . $value->id) }}"><i class="fa fa-eye"></i> </a>
                                <a class="btn btn-success btn-sm" href="{{ url('instansi/' . $value->id . '/edit') }}"> <i
                                        class="fa fa-edit"></i>
                                </a>
                                @can('roles')
                                <a class="btn btn-danger btn-sm delete" data-id="{{ $value->id }}" type="submit"> <i class="fa fa-trash-alt"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left mt-3">
                Showing
                {{ $instansis->firstItem() }}
                to
                {{ $instansis->lastItem() }}
                of
                {{ $instansis->total() }}
                entries
            </div>
            <div class="float-right mt-3">
                {{ $instansis->links('vendor.pagination.custom') }}
            </div>

        </div>
        <!-- /.card-body -->


    </div>
    <!-- /.card -->



    </section>
@endsection

@push('title_modal')
    Laporan Data Instansi
@endpush
@push('button')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/instansi_print_data/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"
            target="_blank" class="btn btn-primary" target="_blank"> Cetak </a>
    </div>
@endpush
@push('button_download')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/instansi_exportpdf/'+ document.getElementById('awal').value + '/' + document.getElementById('akhir').value"
            target="_blank" class="btn btn-primary"> Cetak </a>
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
                        window.location = "delete_instansi/" + userid + ""
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
