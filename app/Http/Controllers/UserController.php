<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; // Mengimpor model Kelas
use App\Models\UserModel; // Mengimpor model UserModel
use App\Http\Requests\UserControllerRequest;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    // Konstruktor untuk inisialisasi model
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // Fungsi index untuk menampilkan halaman daftar user
    public function index()
    {
        $data = [
            'title' => 'Create User',
            'kelas' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    // Fungsi untuk menampilkan halaman create form
    public function create()
    {
        // Mengambil data kelas menggunakan kelasModel
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    // Fungsi store untuk menerima input dari form dan menampilkan profile
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Membuat user baru menggunakan UserModel
        $user = UserModel::create($validatedData);

        // Memuat relasi kelas pada user
        $user->load('kelas');

        // Mengarahkan ke halaman profile setelah penyimpanan berhasil
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }

    // Fungsi profile untuk menampilkan halaman profil pengguna
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }
}
