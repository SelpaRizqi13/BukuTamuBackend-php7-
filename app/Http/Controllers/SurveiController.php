<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survei;
use PDF;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $surveis = Survei::all();
        $surveis = Survei::where('nama_responden', 'LIKE', '%'. $keyword. '%' )
                ->paginate(5);
        $surveis->withPath('survei'); //meminimalisir kesalahan url
        $surveis->appends($request->all()); //menelempar semua request yang diminta
        return view('page.survei.index', compact('surveis', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modul_survei = Survei::find($id);
        $modul_survei->delete();

        return redirect('survei');
    }

    public function exportpdf($awal, $akhir)
    {
        //dd(["Tanggal Awal: ".$awal, "Tanggal Akhir: ".$akhir]);
        //$datas = user::all();

        $surveis = Survei::whereBetween('created_at', [$awal, $akhir])->get();
        view()->share('surveis', $surveis);
        $pdf = PDF::loadview('page.survei.survei_exportpdf');
        return $pdf->download('datasurvei.pdf');
    }
    
    public function print_survei($tglawal, $tglakhir)
    {
        //dd(["Tanggal awal : ".$tglawal,"Tanggal Akhir: ".$tglakhir]);
        $surveis = Survei::whereBetween('created_at', [$tglawal, $tglakhir])->get();
        return view('page.survei.survei_exportpdf', compact('surveis'));
    }
}
