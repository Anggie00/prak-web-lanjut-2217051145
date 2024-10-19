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
        background-color: rgba(255, 255, 255, 0.8); 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        max-width: 80%; 
    }

    .custom-table {
        background-color: rgba(255, 255, 255, 0.5); 
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }

    .custom-table th, .custom-table td {
        background-color: rgba(255, 255, 255, 0.3); 
        text-align: center;
        vertical-align: middle;
        color: #333;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
</style>

<div class="container">
    <h2>Daftar Mahasiswa</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
                    <td>
                        <img src="{{ asset($user->foto) }}" alt="Foto User" width="100">
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
