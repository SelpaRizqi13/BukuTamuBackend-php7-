<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.auth.login.index');
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
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->with('logineror', 'Login gagal, coba perhatikan kembali email dan passwordnya');
        
        $rules = [
            'email'      => 'required|email:dns',
            'password'      => 'required|min:8'
        ];
    
        $messages = [
            'email.required'     => 'Email wajib diisi',
            'email.email'       => 'Email harus berupa alamat email yang valid.',
            'password.required'     => 'Password wajib diisi',
            'password.min'     => 'Kata sandi harus minimal 8 karakter ',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
    
        $remember = $request->has('remember') ? true : false;
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

        $data = [
            'email'     => $enc,
            // input('email'),
            'password'  => $request->input('password'),
        ];
    
        Auth::attempt($data, $remember);
    
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        } else { 
            return redirect()->back()->withInput()->withErrors(['error' => 'Email atau Password salah!']);
        }
    
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
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
