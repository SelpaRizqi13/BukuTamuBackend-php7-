@extends('layouts.theme')

@section('title')
    Data Pengguna
@endsection
@section('title_crumb2')
    Data Tamu
@endsection
@section('tambah_breadcrumb')
    <li class="breadcrumb-item">Data Pengguna</li>
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
                    <a class="btn btn-success" href="{{ url('user/create') }}">
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
                    <form method="GET" action="{{ 'user' }}" class="form-inline">
                        <input type="search" id="search" name="keyword" value="{{ $keyword }}" class="form-control mr-sm-2"
                            placeholder="Seacrh .." />
                        <button class="btn bg-gray-dark disabled color-palette" type="submit">Search <i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th> Tanggal Pembuatan </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $value)
                        <tr>
                            <td class="text-center">{{ $users->firstItem() + $key }}</td>
                            <td>{{ $value->name }}</td>
                            
                            <td>{{ $value->email }}</td>
                            <td class="text-center"><span
                                    class="badge badge-{{ $value->roles == 'admin' ? 'success' : ($value->roles == 'super admin' ? 'warning' : 'info') }}">{{ $value->roles }}</span>
                            </td>
                            <td>{{ $value->created_at }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ url('user/' . $value->id) }}"><i
                                        class="fa fa-eye"></i> </a>
                                <a class="btn btn-success btn-sm" href="{{ url('user/' . $value->id . '/edit') }}"> <i
                                        class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm delete" data-id="{{ $value->id }}" type="submit"> <i
                                        class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left mt-3">
                Showing
                {{ $users->firstItem() }}
                to
                {{ $users->lastItem() }}
                of
                {{ $users->total() }}
                entries
            </div>
            <div class="float-right mt-3">
                {{ $users->links('vendor.pagination.custom') }}
            </div>

        </div>
        <!-- /.card-body -->


    </div>
    <!-- /.card -->



    </section>
@endsection
@push('title_modal')
    Laporan Data Pengguna
@endpush
@push('button')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/user_print_data/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"
            target="_blank" class="btn btn-primary" target="_blank"> Cetak </a>
    </div>
@endpush

@push('button_download')
    <div class="modal-footer">
        <a href=""
            onclick="this.href='/user_exportpdf/'+ document.getElementById('awal').value + '/' + document.getElementById('akhir').value"
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
                        window.location = "delete_user/" + userid + ""
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
