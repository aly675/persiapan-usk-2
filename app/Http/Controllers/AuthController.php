<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|min:9',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('siswa.dashboard-siswa-page')->with('succes', 'anda berhasil login');
        }

        return redirect()->back()->with('error', 'Username atau password anda salah')->withInput();
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate(true);

        return redirect()->route('login-page')->with('succes', 'anda berhasil logout');
    }
}
