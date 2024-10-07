<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "")
{ 
    $data = [ 
        'nama' => $request->input('nama'), 
        'npm' => $request->input('npm'), 
        'kelas' => $request->input('kelas'), 
        ]; 
return view('profile', $data); 
}

}