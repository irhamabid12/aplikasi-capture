<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return redirect()->route('index');
    }

    /*
    * fungsi ini digunakan untuk melakukan login
    * login menggunakan parameter nis dan password yang diinputkan
    * ketika data sesuai maka akan diarahkan ke halaman index 
    * ketika data tidak sesuai maka akan diarahkan ke halaman login
    * @param Request $request
    */
    public function actionlogin(Request $request)
    {
        $data = [
            'nis' => $request->input('nis'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/index');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    /*
    * fungsi ini digunakan untuk melakukan logout
    * ketika logout maka akan diarahkan ke halaman login
    * @param Request $request
    */
    public function logout(Request $request)
    {   
        Auth::logout();
        return redirect('/login');
    }
}
