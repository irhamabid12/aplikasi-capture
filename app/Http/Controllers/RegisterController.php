<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }

    public function insert(Request $request)
    {
        try {
            $regis = User::find($request->id ?? 0) ?? new User;
            $regis->first_name = $request->first_name ?? null;
            $regis->last_name = $request->last_name ?? null;
            $regis->date_of_birth = Carbon::parse($request->born_date ?? null)->format('Y-m-d');
            $regis->username = $request->username ?? null;
            $regis->password = Hash::make($request->password ?? null);
            $regis->save();
    
            return redirect('/login');
        } catch (\Throwable $th) {
            return redirect('/register');    
        }
    }
}
