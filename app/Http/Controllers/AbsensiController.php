<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function dashboard_absensi_page()
    {
        return view('absensi.dashboard-absen');
    }

    public function input_absensi_page()
    {
        return view('absensi.input-absen');
    }
}
