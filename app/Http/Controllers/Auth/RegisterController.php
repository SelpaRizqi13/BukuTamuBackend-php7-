<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.auth.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vallidatedData = $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

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
        for($i=0;$i<strlen($hasil=$request->input('email'));$i++)
        {
            $m=ord($hasil[$i]);
            if($m<=119){
                $enc=$enc.(encRSA($m));
            }
            else{
                $enc=$enc.$hasil[$i];
            }
        }
        $vallidatedData['password'] = Hash::make($vallidatedData['password']);
        $vallidatedData['email'] = $enc($vallidatedData['email']);
        // return request()->all();
        User::create($vallidatedData);

        return redirect ('/login')->with('success', 'Register berhasil, silahkan login!');

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
        //
    }
}
