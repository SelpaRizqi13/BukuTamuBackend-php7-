@extends('layouts.theme')

@section('title')
    Tambah Data Tamu
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('buku_tamu/create') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    
                    <input type="hidden" name="user_id" readonly="" value="{{ auth()->user()->id }}"
                        class="form-control @error('user_id') is-invalid @enderror">


                    @foreach ($errors->get('user_id') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNoToken">No Token</label>
                    <input type="text" name="no_token" readonly="" value="{{ 'T-' . $kd }}"
                        class="form-control @error('no_token') is-invalid @enderror">


                    @foreach ($errors->get('no_token') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputJumlahTamu">Jumlah Tamu</label>
                    <input type="text" name="jumlah_tamu" value="{{ old('jumlah_tamu') }}" required class="form-control @error('jumlah_tamu') is-invalid @enderror">
                    @foreach ($errors->get('jumlah_tamu') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNamaTamu">Nama Tamu</label>
                    <input type="text" name="nama_tamu" class="form-control @error('nama_tamu') is-invalid @enderror">
                    @foreach ($errors->get('nama_tamu') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputAlamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    @foreach ($errors->get('alamat') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNamaInstansi">Nama Instansi</label>
                    <input type="text" name="nama_instansi" 
                        class="form-control @error('nama_instansi') is-invalid @enderror">
                    @foreach ($errors->get('nama_instansi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTanggalKunjungan">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan"
                        class="form-control @error('tanggal_kunjungan') is-invalid @enderror">
                    @foreach ($errors->get('tanggal_kunjungan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputJamKunjungan">Jam Kunjungan</label>
                    <input type="time" name="sunrise" class="form-control @error('sunrise') is-invalid @enderror"
                        id="exampleInputJamKunjungan" placeholder="Jam Kunjungan">
                    @foreach ($errors->get('sunrise') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTujuanInstansi">Tujuan Instansi</label>
                    <select name="tujuan_instansi" data-width="100%" class="form-control select2" wire:model="tujuan_instansi" id="tujuan_instansi">
                        <option value="" {{ old('tujuan_instansi') == ''? 'selected': '' }} >--Pilih Instansi--</option>  
                        @foreach ($getInstansi as $item)  
                        <option value="{{ $item->id }}">{{ $item->nama_instansi }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('tujuan_instansi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTujuanPegawai">Tujuan Pegawai</label>
                    <select name="tujuan_pegawai" class="form-control select2 @error('tujuan_pegawai') is-invalid @enderror"
                        id="tujuan_pegawai" placeholder="tujuan pegawai">
                        
                        <option value="" {{ old('tujuan_pegawai') == ''? 'selected': '' }}>--Pilih Pegawai--</option>
                            
                        
                    </select>
                    @foreach ($errors->get('tujuan_pegawai') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTujuanKunjungan">Tujuan Kunjungan</label>
                    <textarea name="tujuan_kunjungan" class="form-control @error('tujuan_kunjungan') is-invalid @enderror"
                        id="exampleInputTujuanKunjungan" placeholder="tujuan kunjungan"></textarea>
                    @foreach ($errors->get('tujuan_kunjungan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-success" href="{{ url('buku_tamu') }}">
                    Cancel</a>
            </div>

        </form>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
    $('#tujuan_instansi').select2();
});

        $(document).ready(function() {
    $('#tujuan_pegawai').select2();
});
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#tujuan_instansi').on('change', function () {
                var instansiId = this.value;
                $('#tujuan_pegawai').html('');
                $.ajax({
                    url: '{{ route('getdatapegawai') }}?instansi_id='+instansiId,
                    type: 'get',
                    success: function (res) {
                        $('#tujuan_pegawai').html('<option value="">Pilih Pegawai</option>');
                        $.each(res, function (key, value) {
                            $('#tujuan_pegawai').append('<option value="' + value
                                .nama_pegawai + '">' + value.nama_pegawai + '</option>');
                        });
                        
                    }
                });
            });
        });
    </script>
@endpush
