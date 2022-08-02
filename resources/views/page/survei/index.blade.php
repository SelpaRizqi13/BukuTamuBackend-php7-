@extends('layouts.theme')

@section('title')
    Data Survei
@endsection

@section('title_crumb2')
    Data Survei
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <!-- pesan alert -->
            @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif

            <div class="row justify-content-between mt-3 mb-3">
                
                
                <div class="col-8 text-right">
                    <!-- Button to Open the Modal -->
                    <a class="btn bg-primary" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-print"></i> Print</a>
                    <a class="btn bg-danger" data-toggle="modal" data-target="#myModalDownload">
                        <i class="fa fa-file-pdf"></i> pdf</a>
                </div>
               
                <div class="col-4">
                    <form method="GET" action="{{ 'surveis' }}" class="form-inline">
                        <input type="search" name="keyword" value="" class="form-control mr-sm-2"
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
                        <th>Nama Responden</th>
                        <th>email responden</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surveis as $key => $value)
                        <tr>
                            <td class="text-center">{{ $surveis->firstItem() + $key }}</td>
                            
                            <td>{{ $value->nama_responden }}</td>
                            <td>{{ $value->email }}</td>
                            <td class="text-center" width="100px"><a class="btn btn-info btn-sm"><i
                                        class="fa fa-eye"></i> Lihat</a></td>
                            
                            <td class="text-center" width="100px">
                                <form action="{{ url('survei/' . $value->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit"> <i class="fa fa-trash-alt"></i>
                                        Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left mt-3">
                Showing
                {{ $surveis->firstItem() }}
                to
                {{ $surveis->lastItem() }}
                of
                {{ $surveis->total() }}
                entries
            </div>
            <div class="float-right mt-3">
                {{ $surveis->links('vendor.pagination.custom') }}
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

