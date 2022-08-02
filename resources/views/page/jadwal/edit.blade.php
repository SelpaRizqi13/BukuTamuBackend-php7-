@extends('layouts.theme')

@section('title')
    Edit Data Jadwal Kegiatan
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('jadwal/'.$modul_jadwal->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="exampleInputNamaKegiatan">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" value="{{ $modul_jadwal->nama_kegiatan }}" class="form-control"
                        id="exampleInputNamaKegiatan" placeholder="Enter nama kegiatan">
                    @foreach ($errors->get('nama_kegiatan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTanggalKegiatan">Jabatan</label>
                    <input type="date" name="tanggal_kegiatan" value="{{ $modul_jadwal->tanggal_kegiatan }}" class="form-control"
                        id="exampleInputTanggalKegiatan" placeholder="Enter Tanggal Kegiatan">
                    @foreach ($errors->get('tanggal_kegiatan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">Masukkan Image</label>
                    <input type="file" name="image"  class="form-control">
                    <div class="mt-3">
                        <img src="{{ asset('storage/'.$modul_jadwal->image) }}" alt="" style="width: 250px">
                    </div>
                    

                    @foreach ($errors->get('image') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                
                {{-- <div class="form-group">
                    <label for="exampleInputDeskripsi">Deskripsi</label>
                    <textarea type="text" name="deskripsi" value="{{ $modul_jadwal->deskripsi }}" class="form-control"
                        id="exampleInputDeskripsi" placeholder="Enter Deskripsi">{{ $modul_jadwal->deskripsi }}</textarea>
                    @foreach ($errors->get('deskripsi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div> --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">deskripsi</label>
                    <textarea name="deskripsi" value="{{ $modul_jadwal->deskripsi }}" class="content form-control" id="content" cols="30" rows="10">{{ $modul_jadwal->deskripsi }}</textarea>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-success" href="{{ url('jadwal') }}">
                        Cancel</a>
                </div>
                
        </form>
        
    </div>
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
      $('#content').summernote({
        height: "300px",
        styleWithSpan: false
      });
    }); 
  </script>
@endpush