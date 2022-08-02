@extends('layouts.theme')

@section('title')
    Tambah Jadwal Kegiatan
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('jadwal')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputNamaKegiatan">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan"  class="form-control"
                        id="exampleInputNamaKegiatan" placeholder="Enter nama kegiatan">
                    @foreach ($errors->get('nama_kegiatan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTanggalKegiatan">Jabatan</label>
                    <input type="date" name="tanggal_kegiatan" class="form-control"
                        id="exampleInputTanggalKegiatan" placeholder="Enter Tanggal Kegiatan">
                    @foreach ($errors->get('tanggal_kegiatan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                
                <div>
                    <label for="exampleInputTanggalKegiatan" class="form-label">Masukkan Image</label>
                    <input type="file" name="image" class="form-control">
                    @foreach ($errors->get('image') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputDeskripsi">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control"
                        id="exampleInputDeskripsi" placeholder="Enter Deskripsi"></textarea>
                    @foreach ($errors->get('deskripsi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div> --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">deskripsi</label>
                    <textarea id="content" name="deskripsi" class="form-control" rows="10"></textarea>
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
{{-- @push('script')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush --}}
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