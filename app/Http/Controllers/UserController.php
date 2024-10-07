<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserControllerRequest;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
     $this->userModel = new UserModel();
     $this->kelasModel = new Kelas();
    
    }
    public function index()
    {
    $data = [
    'title' => 'Create User',
    'kelas' => $this->userModel->getUser(),
    ];
    return view('list_user', $data);
    }

    public function create(){
        $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();
        $data = [
        'title'=> 'create user',
        'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::create($validatedData);

        $user->load('kelas');

        return redirect()->to('/user');
    }
}
