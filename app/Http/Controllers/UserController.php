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
    public function index(){
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }
    public function create(){
        return view('create_user', [
        'kelas' => Kelas::all(),
    ]);
        $kelasModel = new Kelas();
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' =>
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            //Validasi untuk foto
            ]);
            // Meng-handle upload foto
            if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'uploads'
            $foto_name = $foto->hashName();
            $fotoPath = $foto->move(('upload/img'), $foto_name);
            } else {
            // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
            $fotoPath = null;
            }
            // Menyimpan data ke database termasuk path foto
            $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
            ]);
            return redirect()->to('/user')->with('success', 'User
            berhasil ditambahkan');
            
    }
    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel-> getKelas();
        $title = 'Edit User';
        return view ('edit_user',compact('user','kelas','title'));
    }

    public function update(Request $request, $id)
{
    $user = UserModel::findOrFail($id);
    
    $user->nama = $request->nama;
    $user->npm = $request->npm;
    $user->kelas_id = $request->kelas_id;
   
    if ($request->hasFile('foto')) {
        $oldFilename = $user->foto;
        if ($oldFilename) {
            $oldFilePath = public_path('storage/uploads/' . $oldFilename);
           
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); 
            }
        }
        $file = $request->file('foto');
        $newFilename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $newFilename, 'public'); 
        $user->foto = $newFilename;
    }
   
    $user->save();
    return redirect()->route('user.list')->with('success', 'User Berhasil di Update');
}
public function destroy($id){
    $user = UserModel::findOrFail($id);
    $user->delete();
    return redirect()->to('/')->with('success', 'User Berhasil di Hapus');
}

public function show($id){
    $user = $this->userModel->getUser($id);

    $data = [
        'title' => 'Profile',
        'user'  => $user,
    ];
    $user = UserModel::findOrFail($id);
    $kelas = Kelas::find($user->kelas_id); // Jika ingin menampilkan nama kelas
    return view('profile', [
        'title' => 'Show User',
        'user' => $user,
        'nama_kelas' => $kelas ? $kelas->nama_kelas : null, // Pastikan nama kelas ada, jika tidak tampilkan null
    ]);
    

}
}