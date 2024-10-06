<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayu Puspitasari - Buat Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #f8cfd4, #fdf3b4); /* Gradasi pink soft dan kuning */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            width: 100%;
            max-width: 450px;
            padding: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* Background putih */
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-header {
            background-color: #f9d7da; /* Warna pink soft */
            color: #333; 
            border-bottom: none;
            border-radius: 8px 8px 0 0;
            text-align: center;
            padding-bottom: 10px;
        }
        h1 {
            font-size: 24px;
            font-weight: 600; /* Bold */
            margin-bottom: 15px;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold; /* Bold untuk label */
        }
        input, select {
            border-radius: 10px;
            height: 45px;
            font-size: 14px;
            padding-left: 10px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        input:focus, select:focus {
            border-color: #f9d7da; /* Pink soft saat fokus */
            box-shadow: 0 0 5px rgba(249, 215, 218, 0.7);
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .btn-primary {
            background-color: #f9d7da; /* Pink soft */
            border: none;
            color: #333;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            padding: 10px;
            border-radius: 10px;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #f8bcbc; /* Pink lebih gelap */
        }
        .container {
            margin-top: 20px;
        }
        .text-danger {
            font-size: 12px;
            color: red; /* Merah untuk pesan kesalahan */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Buat Profil</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
                                @foreach($errors->get('nama') as $msg)
                                <p class="text-danger text-xs mt-1 text-left">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="npm">NPM:</label>
                                <input type="text" id="npm" name="npm" class="form-control" placeholder="Masukkan NPM" required>
                                @foreach($errors->get('npm') as $msg)
                                <p class="text-danger text-xs mt-1 text-left">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas:</label>
                                <select name="kelas_id" id="kelas" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @foreach($errors->get('kelas_id') as $msg)
                                <p class="text-danger text-xs mt-1 text-left">{{ $msg }}</p>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
