@extends('layouts.app')
@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="height: 100vh;">
    <!-- Card untuk membungkus form -->
    <div class="card shadow-sm" style="max-width: 500px; background-color: #fff; border-radius: 15px;">
        <div class="card-header text-black" style="background-color: #f9d7da; text-align: center; border-radius: 15px 15px 0 0;">
            <h4 class="text-center" style="font-size: 1.75rem;">Create User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <!-- Input Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label" style="font-size: 1rem;">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" style="border-radius: 10px;">
                </div>
                <!-- Input NPM -->
                <div class="mb-3">
                    <label for="npm" class="form-label" style="font-size: 1rem;">NPM:</label>
                    <input type="text" id="npm" name="npm" class="form-control" placeholder="Masukkan NPM" style="border-radius: 10px;">
                </div>
                <!-- Dropdown Kelas -->
                <div class="mb-3">
                    <label for="kelas_id" class="form-label" style="font-size: 1rem;">Kelas:</label>
                    <select name="kelas_id" id="kelas_id" class="form-select" style="border-radius: 10px;">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" style="background-color: #f9d7da; color: #333; border-radius: 10px; border: none;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection