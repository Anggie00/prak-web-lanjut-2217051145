<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Fungsi untuk menampilkan halaman profil
    public function profile($nama = "", $kelas = "", $npm = "") 
    {
        $data = [ 
            'nama' => $nama, 
            'kelas' => $kelas, 
            'npm' => $npm, 
        ]; 

        return view('profile', $data); 
    }

    // Fungsi untuk menampilkan halaman create form
    public function create()
    { 
        return view('create_user'); 
    }

    // Fungsi store untuk menerima input dari form dan menampilkan profile
    public function store(Request $request) 
        { 
            $data = [ 
                'nama' => $request->input('nama'), 
                'kelas' => $request->input('kelas'), 
                'npm' => $request->input('npm'), 
                ]; 

                return view('profile', $data);
        } 
}
