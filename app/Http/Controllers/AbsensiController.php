<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function dashboard_absensi_page()
    {
        $absensi = Absensi::with(['siswa', 'guru'])->get();
        return view('absensi.dashboard-absen', compact('absensi'));
    }

    public function input_absensi_page()
    {
        return view('absensi.input-absen');
    }
}
