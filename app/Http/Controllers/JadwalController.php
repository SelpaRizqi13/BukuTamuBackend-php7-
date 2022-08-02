<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Http\Requests\JadwalRequest;
use PDF;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $jadwals = Jadwal::all();
        $jadwals = Jadwal::where('nama_kegiatan', 'LIKE', '%' . $keyword . '%')->paginate(5); //membuat data menjadi per page dengan data yang ditampilkan hanya 5
        session::put('halaman_url', request()->fullUrl());
        $jadwals->withPath('jadwal'); //meminimalisir kesalahan url
        $jadwals->appends($request->all()); //menelempar semua request yang diminta
        return view('page.jadwal.index', compact('jadwals', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modul_jadwal = new Jadwal();
        return view('page.jadwal.create', compact('modul_jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        
        $modul_jadwal = Jadwal::create($request->all());
        //create multiple image
        if ($request->hasFile('image')) {
            $s=$request->file('image')->store('assets/upload', 'public');
            $modul_jadwal->image = $s;
            $modul_jadwal->save();
        }
        return redirect('jadwal')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modul_jadwal = Jadwal::find($id);
        return view('page.jadwal.show', compact('modul_jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modul_jadwal = Jadwal::find($id);
        return view('page.jadwal.edit', compact('modul_jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, $id)
    {
        $modul_jadwal = Jadwal::find($id);
        $modul_jadwal->update($request->all());
        //create multiple image
        if ($request->hasFile('image')) {
            $destination = 'assets/upload'.$modul_jadwal->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $s=$request->file('image')->store('assets/upload', 'public');
            $modul_jadwal->image =$s;
            $modul_jadwal->update();
        }
        // if (session('halaman_url')) {
        //     return Redirect(session('halaman_url'))->with('success', 'Data Berhasil di Update');
        // }
        

        return redirect('jadwal')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modul_jadwal = Jadwal::find($id);
        $modul_jadwal->delete();

        return redirect('jadwal');
    }

    public function exportpdf($awal, $akhir)
    {
        //dd(["Tanggal Awal: ".$awal, "Tanggal Akhir: ".$akhir]);
        //$datas = user::all();

        $jadwals = Jadwal::whereBetween('tanggal_kegiatan', [$awal, $akhir])->get();
        view()->share('jadwals', $jadwals);

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('page.jadwal.jadwal_exportpdf', compact('pic'));
        return $pdf->setPaper('a4')->download('datajadwalkegiatan.pdf');
    }
    public function print_jadwal($tglawal, $tglakhir)
    {
        //dd(["Tanggal awal : ".$tglawal,"Tanggal Akhir: ".$tglakhir]);
        $jadwals = Jadwal::whereBetween('tanggal_kegiatan', [$tglawal, $tglakhir])->get();

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return view('page.jadwal.jadwal_exportpdf', compact('jadwals', 'pic'));
    }
}
