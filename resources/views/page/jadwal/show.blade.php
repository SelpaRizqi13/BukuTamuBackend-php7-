@extends('layouts.theme')

@section('title')
    Jadwal Kegiatan 
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
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a class="btn btn-success btn-sm mb-4" href="{{ url('/jadwal') }}" >
                            <i class="fas fa-arrow-left"></i>  Kembali
                        </a>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('storage/'.$modul_jadwal->image)}}" alt="" style="width: 400px">
                        </div>

                    <div class="mt-5">
                        <span class="text-bold">Nama Kegiatan : </span>
                        <p for="">{{ $modul_jadwal->nama_kegiatan}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Tanggal Kegiatan : </span>
                        <p for="">{{ $modul_jadwal->tanggal_kegiatan}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Deskripsi : </span>
                        <p for="">{!! Str::limit( strip_tags( $modul_jadwal->deskripsi ), 1000 ) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
