<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $keyword = $request->keyword;
        $users = User::all();
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')
            ->orwhere('email', 'LIKE', '%' . $keyword . '%')
            ->paginate(5); //membuat data menjadi per page dengan data yang ditampilkan hanya 5
        $users->withPath('user'); //meminimalisir kesalahan url
        $users->appends($request->all()); //menelempar semua request yang diminta

        
        return view('page.data_tamu.user.index', compact('users' ,'keyword'))->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new User();
        return view('page.data_tamu.user.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    

    public function store(UserRequest $request)
    {

        
        function encRSA($M){
            $data[0]=1;
            for($i=0;$i<35;$i++){
                $rest[$i]=pow($M,1)%119;
                if($data[$i]>199){
                    $data[$i+1]=$data[$i]*$rest[$i]%119;
                }
                else{
                    $data[$i+1]=$data[$i]*$rest[$i];
                }
            }
            $get=$data[35]%119;
            return $get;
        }
        $enc=NULL;
        for($i=0;$i<strlen($hasil=$request->email);$i++)
        {
            $m=ord($hasil[$i]);
            if($m<=119){
                $enc=$enc.(encRSA($m));
            }
            else{
                $enc=$enc.$hasil[$i];
            }
        }
        $model = new User();
        $model->name = $request->username;
        $model->email = $enc;
        $model->roles = $request->role;
        $model->password = bcrypt($request->password);
        
        $model->save();

        return redirect('user')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::find($id);
        return view('page.data_tamu.user.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        // $model->email = $enc;

        return view('page.data_tamu.user.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        function encRSA($M){
            $data[0]=1;
            for($i=0;$i<35;$i++){
                $rest[$i]=pow($M,1)%119;
                if($data[$i]>199){
                    $data[$i+1]=$data[$i]*$rest[$i]%119;
                }
                else{
                    $data[$i+1]=$data[$i]*$rest[$i];
                }
            }
            $get=$data[35]%119;
            return $get;
        }
        function decRSA($E){
        $data[0] = 1;
        for ($i = 0; $i < 11; $i++) {
            $rest[$i] = pow($E, 1) % 119;
            if ($data[$i] > 199) {
                $data[$i + 1] = ($data[$i] * $rest[$i]) % 119;
            } else {
                $data[$i + 1] = $data[$i] * $rest[$i];
            }
        }
        $get = $data[11] % 119;
        return $get;
        }
        $enc=NULL;
        for($i=0;$i<strlen($hasil=$request->email);$i++)
        {
            $m=ord($hasil[$i]);
            if($m<=119){
                $enc=$enc.(encRSA($m));
            }
            else{
                $enc=$enc.$hasil[$i];
            }
        }
        $dec = NULL;
        for($i=0;$i<strlen($hasil=$request->email);$i++)
        {
            $m=ord($enc[$i]);
            if($m<=119){
                $dec=$dec.(decRSA($m));
            }
            else{
                $dec=$dec.$enc[$i];
            }
        }
        
        $model = User::find($id);
        $model->name = $request->username;
        $model->email = $enc;
        $model->roles = $request->role;
        $model->password = bcrypt($request->password);
        $model->save();

        return redirect('user')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = user::find($id);
        $model->delete();

        return redirect('user');
    }

    public function exportpdf($awal, $akhir)
    {
        //dd(["Tanggal Awal: ".$awal, "Tanggal Akhir: ".$akhir]);
        //$datas = user::all();

        $users = user::whereBetween('created_at', [$awal, $akhir])->get();
        view()->share('users', $users);

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('page.data_tamu.user.user_exportpdf', compact('pic'));
        return $pdf->setPaper('a4')->download('datapengguna.pdf');
    }
    public function print_user($tglawal, $tglakhir)
    {
        // dd(["Tanggal awal : "."$tglawal","Tanggal Akhir: "."$tglakhir"]);
        $users = user::whereBetween('created_at', [$tglawal, $tglakhir])->get();

        $path = base_path('public/diskominfo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/' .$type. ';base64,' .base64_encode($data);

        return view('page.data_tamu.user.user_exportpdf', compact('users', 'pic'));
    }
}