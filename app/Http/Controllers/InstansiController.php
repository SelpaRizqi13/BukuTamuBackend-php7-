<?php

namespace App\Http\Controllers;
use App\Models\Instansi;
use App\Http\Requests\InstansiRequest;
use Illuminate\Http\Request;
use PDF;
class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $instansis = Instansi::all();
        $instansis = Instansi::where('nama_instansi', 'LIKE', '%' . $keyword . '%')
            ->paginate(5); //membuat data menjadi per page dengan data yang ditampilkan hanya 5
        $instansis->withPath('instansi'); //meminimalisir kesalahan url
        $instansis->appends($request->all()); //menelempar semua request yang diminta
        
        return view('page.data_pegawai.instansi.index', compact('instansis', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tambah = new Instansi();
        return view('page.data_pegawai.instansi.create', compact('tambah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstansiRequest $request)
    {
        $tambah = new Instansi();
        $tambah->nama_instansi = $request->nama_instansi;
        $tambah->lantai=$request->lantai;
        $tambah->save();

        return redirect('instansi')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tambah= Instansi::find($id);
        return view('page.data_pegawai.instansi.show', compact ('tambah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tambah = Instansi::find($id);
        return view ('page.data_pegawai.instansi.edit', compact('tambah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstansiRequest $request, $id)
    {
        $tambah = Instansi::find($id);
        $tambah->nama_instansi = $request->nama_instansi;
        $tambah->lantai=$request->lantai;
        $tambah->save();

        return redirect('instansi')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambah = Instansi::find($id);
        $tambah->delete();
        return redirect('instansi');
    }

    public function exportpdf($awal, $akhir)
    {
        //$datas = user::all();

        $instansis = Instansi::whereBetween('created_at', [$awal, $akhir])->get();
        view()->share('instansis', $instansis);

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('page.data_pegawai.instansi.instansi_exportpdf', compact('pic'));
        return $pdf->setPaper('a4')->download('datapengguna.pdf');
    }
    public function print_instansi($tglawal, $tglakhir)
    {
        // dd(["Tanggal awal : "."$tglawal","Tanggal Akhir: "."$tglakhir"]);
        $instansis = instansi::whereBetween('created_at', [$tglawal, $tglakhir])->get();

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        return view('page.data_pegawai.instansi.instansi_exportpdf', compact('instansis', 'pic'));
    }
}
