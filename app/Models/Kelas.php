<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Melindungi kolom 'id' dari mass assignment
    protected $guarded = ['id'];

    // Menentukan nama tabel secara eksplisit (dari branch Read-Data)
    protected $table = 'kelas';

    // Relasi dengan model UserModel
    public function user()
    {
        return $this->hasMany(UserModel::class, 'kelas_id');
    }

    // Fungsi untuk mengambil semua data kelas (dari branch Read-Data)
    public function getKelas()
    {
        return $this->all();
    }
}
