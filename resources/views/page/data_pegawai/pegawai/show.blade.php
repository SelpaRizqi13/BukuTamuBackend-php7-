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
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a class="btn btn-success btn-sm mb-4" href="{{ url('/pegawai') }}" >
                            <i class="fas fa-arrow-left"></i>  Kembali
                        </a>
                        </div>
                    <div class="">
                        <span class="text-bold">Nama Pegawai : </span>
                        <p for="">{{ $modul_pegawai->nama_pegawai}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Jabatan : </span>
                        <p for="">{{ $modul_pegawai->jabatan}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Jabatan : </span>
                        <p for="">{{ $modul_pegawai->instansi->nama_instansi}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
