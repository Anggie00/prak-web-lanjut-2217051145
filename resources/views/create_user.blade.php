<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Pink and white gradient background */
            background: linear-gradient(45deg, #f8c9c9, #fdf2f2);
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
            max-width: 400px;
            width: 100%;
        }
        .form-header {
            background-color: #f4c2c2;
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
            background-color: #f4c2c2;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-submit:hover {
            background-color: #eab0b0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            Create User
        </div>
        
        <!-- Form Start -->
        <form action="{{ route('user.store') }}" method="POST">
            @csrf <!-- CSRF Token -->
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
            </div>
            
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM" required>
            </div>
            
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required>
            </div>
            
            <button type="submit" class="btn-submit">Submit</button>
        </form>
        <!-- Form End -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
