<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }

    /* 
    * fungsi ini digunakan untuk melakukan registrasi user baru
    * register menggunakan parameter nama, nis dan password yang diinputkan
    * ketika data berhasil disimpan maka akan diarahkan ke halaman login
    * ketika data tidak berhasil disimpan maka akan diarahkan ke halaman register
    * @param Request $request
    */
    public function insert(Request $request)
    {
        $regis = User::find($request->id ?? 0) ?? new User;
        $regis->nama = $request->nama ?? null;
        $regis->nis = $request->nis ?? null;
        $regis->pekerjaan = $request->pekerjaan ?? null;
        if ($request->password != null) {
            $regis->password = Hash::make($request->password ?? null);
        }
        $regis->save();

        if ($request->id) {
            return redirect('/index');
        } else {
            return redirect('/login');
        }
    }
}
