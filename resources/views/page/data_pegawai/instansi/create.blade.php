@extends('layouts.theme')

@section('title')
    Tambah Data Instansi
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('instansi')}}">
            @csrf
            <div class="card-body">
            @include('page.data_pegawai.instansi._form')
            
        </form>
    </div>
@endsection