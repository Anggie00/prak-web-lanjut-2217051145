<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

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
        // Mengambil semua data kelas dari database
        $kelas = Kelas::all();
        
        // Mengirim data kelas ke view
        return view('create_user', ['kelas' => $kelas]);
    }


    // Fungsi store untuk menerima input dari form dan menampilkan profile
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
    ]);

    $user = UserModel::create($validatedData);

    $user->load('kelas');

    return view('profile', [
        'nama' => $user->nama,
        'npm' => $user->npm,
        'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
    ]);
}
}