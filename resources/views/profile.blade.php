<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom right, #f8cfd3, #fdf2f2);
            font-family: 'Arial', sans-serif;
            margin: 0;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 50px;
            width: 500px;
            text-align: center;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 25px !important;
            border: 4px solid #ff69b4;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        .info {
            background-color: pink;
            color: black;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 1rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px; /* Tinggi tetap untuk memusatkan konten */
        }
        .info p {
            margin: 0; /* Hilangkan margin default dari <p> */
            padding: 0; /* Hilangkan padding default dari <p> */
        }
    </style>
</head>
<body>
    <div class="card">
        <img src="{{ asset($user->foto) }}" alt="Foto Profil" class="profile-img">

        <div class="info">
            <p class="label">Nama: {{$user->nama}}</p>
        </div>
        <div class="info">
            <p class="label">NPM: {{$user->npm}}</p>
        </div>
        <div class="info">
            <p class="label">Kelas: {{$user->nama_kelas ?? 'Kelas Tidak Ditemukan'}}</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
