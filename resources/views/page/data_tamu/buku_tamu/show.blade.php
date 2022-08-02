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
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a class="btn btn-success btn-sm mb-4" href="{{ url('/buku_tamu') }}">
                            <i class="fas fa-arrow-left"></i>  Kembali
                        </a>
                    </div>
                    <div class="">
                        <span class="text-bold">No Token : </span>
                        <p for="">{{ $modul_bukutamu->no_token }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Nama : </span>
                        <p for="">{{ $modul_bukutamu->nama_tamu }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Jumlah Tamu yang berkunjung : </span>
                        <p for="">{{ $modul_bukutamu->jumlah_tamu }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Alamat : </span>
                        <p for="">{{ $modul_bukutamu->alamat}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Asal Instansi : </span>
                        <p for="">{{ $modul_bukutamu->nama_instansi }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Tanggal Berkunjung : </span>
                        <p for="">{{ $modul_bukutamu->tanggal_kunjungan }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Jam Berkunjung : </span>
                        <p for="">{{ $modul_bukutamu->sunrise }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Tujuan Bidang atau Divisi : </span>
                        <p for="">{{ $modul_bukutamu->instansi->nama_instansi }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Tujuan Pegawai : </span>
                        <p for="">{{ $modul_bukutamu->tujuan_pegawai }}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Tujuan Kunjungan : </span>
                        <p for="">{{ $modul_bukutamu->tujuan_kunjungan}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Status : </span>
                        <p for="">acc atau tolak</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
