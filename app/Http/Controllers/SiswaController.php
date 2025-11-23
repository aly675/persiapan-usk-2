<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function dashboard_siswa_page()
    {
        return view('siswa.dashboard-siswa');
    }




    public function input_siswa_page()
    {
        return view('siswa.input-siswa');
    }



    public function edit_siswa_page()
    {
        return view('siswa.edit-siswa');
    }
}
