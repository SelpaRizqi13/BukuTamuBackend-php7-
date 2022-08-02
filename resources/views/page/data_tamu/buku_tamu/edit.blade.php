@extends('layouts.theme')

@section('title')
    Edit Data Tamu
@endsection

@section('content')
    <div class="card">
        <form id="quickForm" method="POST" action="{{ url('buku_tamu/' . $modul_bukutamu->id) }}">
            @csrf
            <div class="card-body">
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="exampleInputNoToken">No Token</label>
                    <input type="text" name="no_token" readonly="" class="form-control @error('no_token') is-invalid @enderror"
                        value="{{ $modul_bukutamu->no_token }}">
                    @foreach ($errors->get('no_token') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputJumlahTamu">Jumlah Tamu</label>
                    <input type="text" name="jumlah_tamu" class="form-control @error('jumlah_tamu') is-invalid @enderror"
                        value="{{ $modul_bukutamu->jumlah_tamu }}">
                    @foreach ($errors->get('jumlah_tamu') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNamaTamu">Nama Tamu</label>
                    <input type="text" name="nama_tamu" class="form-control @error('nama_tamu') is-invalid @enderror"
                        value="{{ $modul_bukutamu->nama_tamu }}">
                    @foreach ($errors->get('nama_tamu') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputAlamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        value="{{ $modul_bukutamu->alamat }}">
                    @foreach ($errors->get('alamat') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputNamaInstansi">Nama Instansi</label>
                    <input type="text" name="nama_instansi" class="form-control @error('nama_instansi') is-invalid @enderror"
                        value="{{ $modul_bukutamu->nama_instansi }}">
                    @foreach ($errors->get('nama_instansi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTanggalKunjungan">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan" class="form-control @error('tanggal_kunjungan') is-invalid @enderror"
                        value="{{ $modul_bukutamu->tanggal_kunjungan }}">
                    @foreach ($errors->get('tanggal_kunjungan') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputJamKunjungan">Jam Kunjungan</label>
                    <input type="time" name="sunrise" class="form-control @error('sunrise') is-invalid @enderror"
                        value="{{ $modul_bukutamu->sunrise }}" id="exampleInputJamKunjungan"
                        placeholder="Jam Kunjungan">
                    @foreach ($errors->get('sunrise') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTujuanInstansi">Tujuan Instansi</label>
                    <select name="tujuan_instansi" class="form-control select2" id="tujuan_instansi">
                        @foreach ($getInstansi as $item)
                            <option {{ $item->id == $modul_bukutamu->instansi_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_instansi }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('tujuan_instansi') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTujuanPegawai">Tujuan Pegawai</label>
                    <select name="tujuan_pegawai" class="form-control select2" id="tujuan_pegawai">
                        <option {{ $item->tujuan_pegawai ? 'selected' : '' }} value="{{ $item->tujuan_pegawai }}">{{ $item->tujuan_pegawai }}</option>

                    </select>
                    @foreach ($errors->get('tujuan_pegawai') as $msg)
                        <p class="text-danger">{{ $msg }} </p>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleInputTujuanKunjungan">Tujuan Kunjungan</label>
                    <textarea name="tujuan_kunjungan" class="form-control @error('tujuan_kunjungan') is-invalid @enderror"
                        value="{{ $modul_bukutamu->tujuan_kunjungan }}" id="exampleInputTujuanKunjungan" placeholder="tujuan kunjungan">{{ $modul_bukutamu->tujuan_kunjungan }}</textarea>
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
