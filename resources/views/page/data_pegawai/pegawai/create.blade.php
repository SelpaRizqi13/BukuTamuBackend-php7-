@extends('layouts.theme')

@section('title')
    Tambah Data Pegawai
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('pegawai')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputNama">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" >
                    @foreach ($errors->get('nama_pegawai') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNama">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                    @foreach ($errors->get('jabatan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNama">Divisi</label>
                    <select name="divisi" id="" class="form-control">
                        <option value="" {{ old('divisi') == ''? 'selected': '' }} >--Pilih Divisi--</option>  
                        @foreach ($getInstansi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_instansi }}</option>
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