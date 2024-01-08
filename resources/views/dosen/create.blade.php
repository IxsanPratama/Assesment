@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Data Dosen</h1>
    @if (session('success'))
    <div class="alert alert-success">session('success')
    </div>
    @endif
    
    <form action="{{ route('dosen.store') }}" method="POST">
        {{ csrf_field() }}
        Nama: <input type="int" name="nama" placeholder="nama" required><br>
        Nip: <input type="text" name="nip" placeholder="nip" required><br>
        Jabatan: <input type="text" name="jabatan" placeholder="jabatan" required><br>
        <input type="submit" value="Submit">


    </form>
</div>

{{-- <label for="nama">Nama:</label>
    <input type="int" id="nama" name="Nama" required>

    <br>

    <label for="nip">Nip:</label>
    <textarea id="text" name="Nip" required></textarea>

    <br>

    <label for="jabatan">Jabatan:</label>
    <input type="text" id="jabatan" name="jabatan" required>

    <br>

    <input type="submit" value="Submit"> --}}

@endsection