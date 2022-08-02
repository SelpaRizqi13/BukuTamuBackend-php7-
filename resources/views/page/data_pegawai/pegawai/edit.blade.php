@extends('layouts.theme')

@section('title')
    Edit Data Pegawai
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('pegawai/'.$modul_pegawai->id)}}">
            @csrf
            <div class="card-body">
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="exampleInputNama">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" 
                    value="{{ $modul_pegawai->nama_pegawai }}">
                    @foreach ($errors->get('nama_pegawai') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNama">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                    value="{{ $modul_pegawai->jabatan }}">
                    @foreach ($errors->get('jabatan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNama">Divisi</label>
                    <select name="divisi" id="" class="form-control">
                        @foreach ($getInstansi as $item)
                            <option {{ $item->id == $modul_pegawai->instansi_id ? 'selected' : '' }}
                            value="{{ $item->id }}">{{ $item->nama_instansi }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('divisi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-success" href="{{ url('pegawai') }}">
                        Cancel</a>
                </div>
                
        </form>
        
    </div>
@endsection