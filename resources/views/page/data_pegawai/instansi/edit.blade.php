@extends('layouts.theme')

@section('title')
    Edit Data Instansi
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('instansi/'.$tambah->id)}}">
            @csrf
            <div class="card-body">
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="exampleInputNama">Nama Instansi</label>
                    <input type="text" name="nama_instansi" value="{{$tambah->nama_instansi}}" class="form-control" placeholder="Enter username">
                    @foreach($errors->get('nama_instansi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNama">Lantai</label>
                    <select name="lantai" id="" class="form-control">
                        <option value="{{$tambah->lantai}}">{{$tambah->lantai}}</option>
                        <option > Lantai 1</option>
                        <option > Lantai 2</option>
                        <option > Lantai 3</option>
                    </select>
                    @foreach($errors->get('lantai') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-success" href="{{ url('instansi') }}">
                    Cancel</a>
                </div>
                
        </form>
            
        
    </div>
@endsection