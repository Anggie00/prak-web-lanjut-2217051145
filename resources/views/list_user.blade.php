<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            width: 18rem;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-container">
            @foreach ($users as $user)
            <div class="card">
                <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" class="card-img-top" alt="User Photo">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->nama }}</h5>
                    <p class="card-text">NPM: {{ $user->npm }}</p>
                    <p class="card-text">Kelas: {{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
                    <p class="card-text">Jurusan: {{ $user->jurusan }}</p>
                    <p class="card-text">Semester: {{ $user->semester }}</p>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Detail Profile</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>