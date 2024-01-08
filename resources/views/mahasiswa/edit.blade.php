@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Data Mahasiswa</h1>
    {{-- @if (session('success'))
    <div class="alert alert-success">session('success')
    </div>
    @endif --}}
    
    <form action="{{ route('mahasiswa.update', $mahasiswas->id ) }}" method="POST">
        @csrf
        @method('PUT')
        Nim: <input type="int" name="nim" placeholder="Nim" required><br>
        Nama: <input type="text" name="nama" placeholder="Nama" required><br>
        Prodi: <input type="text" name="prodi" required="Prodi" requires><br>
        <input type="submit" value="Update">

    </form>
</div>

@endsection