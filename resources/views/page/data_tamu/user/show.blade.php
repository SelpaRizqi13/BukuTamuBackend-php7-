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
            <div class="row">
                <div class="col-md-12">
                    <div>
                    <a class="btn btn-success btn-sm mb-4" href="{{ url('/user') }}" >
                        <i class="fas fa-arrow-left"></i>  Kembali
                    </a>
                    </div>
                    <div class="">
                        <span class="text-bold">Username : </span>
                        <p for="">{{ $model->name}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Email : </span>
                        <p for="">{{ $model->email}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Role : </span>
                        <p for="">{{ $model->roles}}</p>
                    </div>
                    <div class="">
                        <span class="text-bold">Tanggal Pembuatan : </span>
                        <p for="">{{ $model->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
