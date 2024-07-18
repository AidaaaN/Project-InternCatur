<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'login',
            'appTitle' => 'Persuratan'
        ];
        return view('login.login', $data);
    }
    public function check(Request $request){
        $postData = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ]
        );
        if(Auth::attempt($postData)):
            //jika login berhasil maka akan masuk ke dashboard
            $request->session()->regenerate();
            if(Auth::user()->level == 'admin') :
                return response(
                    [
                        'success'=>true,
                        'redirect_url' => '/arsip',
                        'pesan'=>'login berhasil'
                    ],
                    200);
            else:
                return response(
                    [
                        'success'=> false,
                    ],
                    401);
            endif;
        else:
        endif;
    }
    public function logout(){
        Auth::logout();
        route('login.login');
    }
}
