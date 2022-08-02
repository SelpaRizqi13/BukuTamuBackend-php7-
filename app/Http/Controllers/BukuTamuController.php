<?php

namespace App\Http\Controllers;
use App\Models\BukuTamu;
use App\Models\Pegawai;
use App\Models\Instansi;
use App\Http\Requests\BukutamuRequest;
use Illuminate\Http\Request;
use PDF;
use DB;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $buku_tamus = BukuTamu::with('instansi');
        $buku_tamus = BukuTamu::where('nama_tamu', 'LIKE', '%' . $keyword . '%')->paginate(5); //membuat data menjadi per page dengan data yang ditampilkan hanya 5
        $buku_tamus->withPath('buku_tamu'); //meminimalisir kesalahan url
        $buku_tamus->appends($request->all()); //menelempar semua request yang diminta

        return view('page.data_tamu.buku_tamu.index', compact('buku_tamus', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $getkode = DB::table('buku_tamus')->select(DB::raw('MAX(RIGHT(no_token, 4)) as kode'));
        $kd = '';
        if ($getkode->count() > 0) {
            foreach ($getkode->get() as $k) {
                $tmp = ((int) $k->kode) + 1;
                $kd = sprintf('%04s', $tmp);
            }
        } else {
            $kd = '0001';
        }
        $pegawai = DB::table('pegawais')
            ->where('instansi_id', $request->instansi_id)
            ->get();
            if (count($pegawai) > 0) {
            return response()->json($pegawai);
        }

        $getInstansi = Instansi::all();
        $getPegawai = Pegawai::all();

        return view('page.data_tamu.buku_tamu.create', compact('getInstansi', 'kd', 'pegawai', 'getPegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukutamuRequest $request)
    {
        $modul_bukutamu = new BukuTamu();
        $modul_bukutamu->user_id =$request->user_id;
        $modul_bukutamu->no_token = $request->no_token;
        $modul_bukutamu->jumlah_tamu = $request->jumlah_tamu;
        $modul_bukutamu->nama_tamu = $request->nama_tamu;
        $modul_bukutamu->alamat = $request->alamat;
        $modul_bukutamu->nama_instansi = $request->nama_instansi;
        $modul_bukutamu->tanggal_kunjungan = $request->tanggal_kunjungan;
        $modul_bukutamu->sunrise = $request->sunrise;
        $modul_bukutamu->instansi_id = $request->tujuan_instansi;
        $modul_bukutamu->tujuan_pegawai = $request->tujuan_pegawai;
        $modul_bukutamu->tujuan_kunjungan = $request->tujuan_kunjungan;
        $modul_bukutamu->save();
        return redirect('buku_tamu')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modul_bukutamu = BukuTamu::with(['instansi'])->findOrFail($id);
        return view('page.data_tamu.buku_tamu.show', compact('modul_bukutamu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $modul_bukutamu = BukuTamu::find($id);
        $getInstansi = Instansi::all();
        $pegawai = DB::table('pegawais')
            ->where('instansi_id', $request->instansi_id)
            ->get();
            if (count($pegawai) > 0) {
            return response()->json($pegawai);
        }
        return view('page.data_tamu.buku_tamu.edit', compact('modul_bukutamu', 'getInstansi', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukutamuRequest $request, $id)
    {
        $modul_bukutamu = BukuTamu::findOrFail($id);
        $modul_bukutamu->no_token = $request->no_token;
        $modul_bukutamu->jumlah_tamu = $request->jumlah_tamu;
        $modul_bukutamu->nama_tamu = $request->nama_tamu;
        $modul_bukutamu->alamat = $request->alamat;
        $modul_bukutamu->nama_instansi = $request->nama_instansi;
        $modul_bukutamu->tanggal_kunjungan = $request->tanggal_kunjungan;
        $modul_bukutamu->sunrise = $request->sunrise;
        $modul_bukutamu->instansi_id = $request->tujuan_instansi;
        $modul_bukutamu->tujuan_pegawai = $request->tujuan_pegawai;
        $modul_bukutamu->tujuan_kunjungan = $request->tujuan_kunjungan;
        $modul_bukutamu->status='In progress';
        $modul_bukutamu->save();
        return redirect('buku_tamu')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modul_bukutamu = BukuTamu::find($id);
        $modul_bukutamu->delete();
        return redirect('buku_tamu');
    }

    public function exportpdf($awal, $akhir)
    {
        //dd(["Tanggal Awal: ".$awal, "Tanggal Akhir: ".$akhir]);
        //$datas = user::all();

        $buku_tamus = BukuTamu::whereBetween('tanggal_kunjungan', [$awal, $akhir])->get();
        view()->share('buku_tamus', $buku_tamus);
    
        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('page.data_tamu.buku_tamu.tamu_exportpdf', compact('pic')); 
        return $pdf->setPaper('a4', 'landscape')->download('datatamu.pdf');
    }
    public function print_tamu($tglawal, $tglakhir)
    {
        // dd(["Tanggal awal : "."$tglawal","Tanggal Akhir: "."$tglakhir"]);
        $buku_tamus = BukuTamu::whereBetween('tanggal_kunjungan', [$tglawal, $tglakhir])->get();
        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);
        return view('page.data_tamu.buku_tamu.tamu_exportpdf', compact('buku_tamus', 'pic'));
    }
    public function getpegawai(Request $request)
    {
        $pegawai = DB::table('pegawais')
            ->where('instansi_id', $request->instansi_id)
            ->get();

        if (count($pegawai) > 0) {
            return response()->json($pegawai);
        }
    }
    public function approved($id)
    {
        $modul_bukutamu = BukuTamu::find($id);
        $modul_bukutamu->status='Acc';
        $modul_bukutamu->save();
        return redirect()->back();
    }
    public function canceled($id)
    {
        $modul_bukutamu = BukuTamu::find($id);
        $modul_bukutamu->status='Tolak';
        $modul_bukutamu->save();
        return redirect()->back();
    }
}
