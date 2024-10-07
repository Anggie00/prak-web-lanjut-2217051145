<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Menggunakan Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Menggunakan Bootstrap CSS (jika diperlukan) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to bottom right, #FFDFD6, #E3A5C7); /* Gradasi warna */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 400px; 
            text-align: center;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .profile-card img {
            width: 120px; 
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .profile-card .info {
            background-color: #fbcdd6; /* Warna latar belakang untuk informasi */
            border-radius: 20px;
            padding: 10px;
            margin: 10px 0;
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <img id="anggie" src="{{ asset('images/nn.jpg') }}" alt="Foto Profil">
        <div class="info">{{ $nama }}</div>
        <div class="info">{{ $npm }}</div>
        <div class="info">{{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</div> <!-- Menggunakan nama_kelas dari model -->
    </div>

</body>
</html>
