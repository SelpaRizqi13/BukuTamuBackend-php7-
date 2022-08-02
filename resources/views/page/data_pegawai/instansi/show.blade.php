@extends('layouts.theme')

@section('title')
    Data Instansi 
@endsection
@section('title_crumb2')
    Data Pegawai
@endsection
@section('tambah_breadcrumb')
    <li class="breadcrumb-item">Data Instansi</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div>
                    <a class="btn btn-success btn-sm mb-4" href="{{ url('/instansi') }}" >
                        <i class="fas fa-arrow-left"></i>  Kembali
                    </a>
                    </div>
                    <div class="">
                        <span class="text-bold">Nama Instansi : </span>
                        <p for="">{{ $tambah->nama_instansi}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Lokasi Lantai : </span>
                        <p for="">{{ $tambah->lantai}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
