<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Instansi;
use App\Http\Requests\PegawaiRequest;
use PDF;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        
        $pegawais = Pegawai::with('instansi');
        $pegawais = Pegawai::where('nama_pegawai', 'LIKE', '%' . $keyword . '%')
            ->paginate(5); //membuat data menjadi per page dengan data yang ditampilkan hanya 5
        $pegawais->withPath('pegawai'); //meminimalisir kesalahan url
        $pegawais->appends($request->all()); //menelempar semua request yang diminta
        return view('page.data_pegawai.pegawai.index', compact('pegawais', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $modul_pegawai = new Pegawai();
        // return view ('page.data_pegawai.pegawai.create', compact ('modul_pegawai'));

        $getInstansi = Instansi::all();
        return view ('page.data_pegawai.pegawai.create', compact ('getInstansi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        $modul_pegawai = new Pegawai();
        $modul_pegawai->nama_pegawai = $request->nama_pegawai;
        $modul_pegawai->jabatan = $request->jabatan;
        $modul_pegawai->instansi_id = $request->divisi;
        $modul_pegawai->save();
        return redirect('pegawai')-> with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $modul_pegawai = Pegawai::with(['instansi'])
        ->findOrFail($id);
        return view('page.data_pegawai.pegawai.show', compact('modul_pegawai'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modul_pegawai = Pegawai::find($id);
        $getInstansi=Instansi::all();
        return view ('page.data_pegawai.pegawai.edit', compact ('modul_pegawai', 'getInstansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
        $modul_pegawai= Pegawai::findOrFail($id);
        $modul_pegawai->nama_pegawai = $request->nama_pegawai;
        $modul_pegawai->jabatan = $request->jabatan;
        $modul_pegawai->instansi_id = $request->divisi;
        $modul_pegawai->save();
        return redirect('pegawai')-> with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modul_pegawai = Pegawai::find($id);
        $modul_pegawai->delete();
        return redirect ('pegawai');
    }

    public function exportpdf($awal, $akhir)
    {
        //dd(["Tanggal Awal: ".$awal, "Tanggal Akhir: ".$akhir]);
        //$datas = user::all();

        $pegawais = Pegawai::whereBetween('created_at', [$awal, $akhir])->get();
        view()->share('pegawais', $pegawais);

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('page.data_pegawai.pegawai.pegawai_exportpdf', compact('pic'));
        return $pdf->setPaper('a4')->download('datapegawai.pdf');
    }
    public function print_pegawai($tglawal, $tglakhir)
    {
        //dd(["Tanggal awal : ".$tglawal,"Tanggal Akhir: ".$tglakhir]);
        $pegawais = Pegawai::whereBetween('created_at', [$tglawal, $tglakhir])->get();

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        return view('page.data_pegawai.pegawai.pegawai_exportpdf', compact('pegawais', 'pic'));
    }
}
