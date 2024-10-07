@extends('layouts.app')

@section('content')
<style>
    body {
            background: linear-gradient(to right, #f8cfd4, #fdf3b4); 
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

    .container {
        background-color: rgba(255, 255, 255, 0.8); /* Memberikan sedikit transparansi pada background kontainer */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk efek */
        max-width: 80%; /* Membatasi lebar kontainer */
    }

    .custom-table {
        background-color: rgba(255, 255, 255, 0.5); /* Transparansi pada background tabel */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow untuk efek */
    }

    .custom-table th, .custom-table td {
        background-color: rgba(255, 255, 255, 0.3); /* Transparansi pada th dan td */
        text-align: center;
        vertical-align: middle;
        color: #333; /* Warna teks untuk memastikan kontras tetap terlihat */
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
</style>

<div class="container">
    <h2>Daftar Mahasiswa</h2>
    <table class="table table-bordered table-striped custom-table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user['npm'] }}</td>
                <td>{{ $user['nama_kelas'] }}</td>
                <td>
                    <a href="/edit/{{ $user['id'] }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="/delete/{{ $user['id'] }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
