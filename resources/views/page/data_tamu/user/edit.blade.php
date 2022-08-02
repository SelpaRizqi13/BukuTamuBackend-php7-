@extends('layouts.theme')

@section('title')
    Edit Data Pengguna
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('user/'.$model->id)}}">
            @csrf
            <div class="card-body">
                <input type="hidden" name="_method" value="PATCH">
                @include('page.data_tamu.user._form')
        </form>
            
        
    </div>
@endsection