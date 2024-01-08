@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Data Prodi</h1>
    {{-- @if (session('success'))
    <div class="alert alert-success">session('success')
    </div>
    @endif --}}
    
    <form action="{{ route('prodi.update', $prodis->id ) }}" method="POST">
        @csrf
        @method('PUT')
        Nim: <input type="int" name="nim" placeholder="Nim" required><br>
        Angkatan: <input type="text" name="angkatan" placeholder="Angkatan" required><br>
        Jurusan: <input type="text" name="jurusan" plasholder="Jurusan" required><br>
        <input type="submit" value="Update">

    </form>
</div>

@endsection