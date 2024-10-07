@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="form-container">
        <div class="form-header">
            Buat Profil
        </div>
        
        <!-- Form Start -->
        <form action="{{ route('user.store') }}" method="POST" novalidate>
            @csrf <!-- CSRF Token -->
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
            
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM" required>
                @foreach($errors->get('npm') as $msg)
                <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
            
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas" class="form-select" required>
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
                @foreach($errors->get('kelas_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
                @endforeach
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" style="background-color: #f4c2c2; color: white; border: none; border-radius: 5px;">Submit</button>
            </div>
        </form>
        <!-- Form End -->
    </div>
</div>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body {
        background: linear-gradient(45deg, #f8c9c9, #fdf2f2); /* Gradasi pink dan putih */
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 450px; /* Ukuran maksimum kontainer */
        width: 100%;
    }
    .form-header {
        background-color: #f4c2c2; /* Warna latar belakang header */
        padding: 10px;
        border-radius: 10px 10px 0 0;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
    }
    .form-label {
        font-weight: bold;
    }
    .btn-submit {
        background-color: #f4c2c2; /* Warna tombol */
        color: white;
        border: none;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }
    .btn-submit:hover {
        background-color: #eab0b0; /* Warna tombol saat hover */
    }
    .text-danger {
        font-size: 12px;
        color: red; /* Merah untuk pesan kesalahan */
    }
</style>
@endsection
