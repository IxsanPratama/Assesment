@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Data Mata Kuliah</h1>
    @if (session('success'))
    <div class="alert alert-success">session('success')
    </div>
    @endif
    
    <form action="{{ route('matakuliah.store') }}" method="POST">
        {{ csrf_field() }}
        Nim: <input type="int" name="kode" placeholder="kode" required><br>
        Nama: <input type="text" name="matakuliah" placeholder="matakuliah" required><br>
        Prodi: <input type="text" name="kelas" placeholder="kelas" required><br>
        <input type="submit" value="Submit">


    </form>
</div>

{{-- <label for="nim">Nim:</label>
    <input type="int" id="nim" name="Nim" required>

    <br>

    <label for="nama">Nama:</label>
    <textarea id="text" name="Nama" required></textarea>

    <br>

    <label for="prodi">Prodi:</label>
    <input type="text" id="prodi" name="prodi" required>

    <br>

    <input type="submit" value="Submit"> --}}

@endsection