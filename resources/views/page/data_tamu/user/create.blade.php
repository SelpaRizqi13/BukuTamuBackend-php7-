@extends('layouts.theme')

@section('title')
    Tambah Data Pengguna
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('user')}}">
            @csrf
            <div class="card-body">
            @include('page.data_tamu.user._form')
            
        </form>
    </div>
@endsection