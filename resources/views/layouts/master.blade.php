<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Data Akademik')</title>
    <!-- Tambahkan link ke CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Tambahkan link ke CSS aplikasi Anda jika diperlukan -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Sesuaikan dengan link CSS atau framework yang Anda gunakan -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <br><br><a class="navbar-brand" href="{{ route('mahasiswa.index') }}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dosen.index') }}">Dosen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('prodi.index') }}">Program Studi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('matakuliah.index') }}">Mata Kuliah</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
       

<!-- Tambahkan script ke JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Tambahkan script JS aplikasi Anda jika diperlukan -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>