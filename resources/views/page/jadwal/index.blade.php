@extends('layouts.theme')

@section('title')
    Data Jadwal Kegiatan
@endsection
@section('title_crumb2')
    Data Jadwal Kegiatan
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
                    <a class="btn btn-success" href="{{ url('jadwal/create') }}">
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
                    <form method="GET" action="{{ 'jadwal' }}" class="form-inline">
                        <input type="search" name="keyword" value="" class="form-control mr-sm-2"
                            placeholder="Seacrh .." />
                        <button class="btn bg-gray-dark disabled color-palette" type="submit">Search <i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <table id="example2" class="table table-bordered table-hover autoWidth">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th >Nama Kegiatan</th>
                        <th >Tanggal Kegiatan</th>
                        <th >Deskripsi</th>
                        <th>Image Kegiatan</th>

                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $key => $value)
                        <tr>
                            <td class="text-center">{{ $jadwals->firstItem() + $key }}</td>

                            <td>{{ $value->nama_kegiatan }}</td>
                            <td>{{ $value->tanggal_kegiatan }}</td>
                            <td>{!! Str::limit( strip_tags( $value->deskripsi ), 50 ) !!}</td>
                            <td>
                                <img src="{{ asset('storage/' . $value->image) }}" alt="" style="width: 100px">
                            </td>

                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ url('jadwal/' . $value->id) }}"><i
                                        class="fa fa-eye"></i> </a>
                                <a class="btn btn-success btn-sm mt-1" href="{{ url('jadwal/' . $value->id . '/edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @can('roles')
                                    <a class="btn btn-danger btn-sm mt-1 delete" data-id="{{ $value->id }}" type="submit">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left mt-3">
                Showing
                {{ $jadwals->firstItem() }}
                to
                {{ $jadwals->lastItem() }}
                of
                {{ $jadwals->total() }}
                entries
            </div>
            <div class="float-right mt-3">
                {{ $jadwals->links('vendor.pagination.custom') }}
            </div>

        </div>
        <!-- /.card-body -->


    </div>
    <!-- /.card -->



    </section>
@endsection

@push('title_modal')
    Laporan Data Jadwal Kegiatan
@endpush
@push('button')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/jadwal_print_data/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"
            target="_blank" class="btn btn-primary" target="_blank"> Cetak </a>
    </div>
@endpush
@push('button_download')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/jadwal_exportpdf/'+ document.getElementById('awal').value + '/' + document.getElementById('akhir').value"
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
                        window.location = "delete_jadwal/" + userid + ""
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
