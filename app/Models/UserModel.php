<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'user';

    // Melindungi kolom 'id' dari mass assignment
    protected $guarded = ['id'];

    // Relasi dengan model Kelas
    public function kelas()
    {
    public function getUser($id=null){
        if($id != null){
            return $this->join('kelas','kelas.id','=','user.kelas_id')
                ->select('user.*','kelas.nama_kelas')
                ->where('user.id',$id)
                ->first();
        }
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')->select('user.*', 'kelas.nama_kelas as nama_kelas')->get();
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Fungsi untuk mendapatkan data user dengan join ke tabel kelas (dari Read-Data)
    public function getUser()
    {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }
    public function getUser($id=null){
        if($id != null){
            return $this->join('kelas','kelas.id','=','user.kelas_id')
            ->select('user.*','kelas.nama_kelas')
            ->where('user.id',$id)
            ->first();
        }
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')->select('user.*', 'kelas.nama_kelas as nama_kelas')->get();
    }
    
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
    ];
    
}
    

}