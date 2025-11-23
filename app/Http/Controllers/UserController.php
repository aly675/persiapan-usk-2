<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard_guru_page()
    {
        return view('guru.dashboard-guru');
    }




    public function input_guru_page()
    {
        return view('guru.input-guru');
    }



    public function edit_guru_page()
    {
        return view('guru.edit-guru');
    }
}
