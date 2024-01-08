<!DOCTYPE html>
<html lang="en">
<head>
    <title>Documents</title>
</head>
<body>
    <div class="container">
    <h1>Data Mahasiswa</h1>
    <br>
    <a href= "{{ route('mahasiswa.index') }}" class="btn btn-primary">Home</a>
    <a href= "{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambahkan Mahasiswa</a>
    @yield('content')
    </div>
</body>
</html>