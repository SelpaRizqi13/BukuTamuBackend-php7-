<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
 

    //Register user
    public function register(Request $request)
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
        //validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        
        $enc=NULL;
        for($i=0;$i<strlen($hasil=$attrs['email']);$i++)
        {
            $m=ord($hasil[$i]);
            if($m<=119){
                $enc=$enc.(encRSA($m));
            }
            else{
                $enc=$enc.$hasil[$i];
            }
        }
        
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $enc,
            'password' => bcrypt($attrs['password'])
        ]);

        // $user = new User();
        // $user->name = $attrs->username;
        // $user->email = $enc;
        // $user->password = bcrypt($attrs->password);

        //return user & token in response
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ], 200);
    }

    // login user
    public function login(Request $request)
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
        //validate fields
        $attrs = $request->validate([
            
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        $enc=NULL;
        for($i=0;$i<strlen($hasil=$attrs['email']);$i++)
        {
            $m=ord($hasil[$i]);
            if($m<=119){
                $enc=$enc.(encRSA($m));
            }
            else{
                $enc=$enc.$hasil[$i];
            }
        }
        $ceredential =[
            'email' => $enc,
            'password'  => $attrs['password'],
        ];
        // attempt login
        if(!Auth::attempt($ceredential))
        {
            return response([
                'data' => $ceredential,
                'message' => 'Invalid credentials.'
            ], 403);
        }

        //return user & token in response
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }

    
    // logout user
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success.'
        ], 200);
    }

    // get user details
    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    // update user
    public function update(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string'
        ]);

        $image = $this->saveImage($request->image, 'profiles');

        auth()->user()->update([
            'name' => $attrs['name'],
            'image' => $image
        ]);

        return response([
            'message' => 'User updated.',
            'user' => auth()->user()
        ], 200);
    }
    
}
