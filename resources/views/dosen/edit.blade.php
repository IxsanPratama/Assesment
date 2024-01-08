@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Data Dosen</h1>
    {{-- @if (session('success'))
    <div class="alert alert-success">session('success')
    </div>
    @endif --}}
    
    <form action="{{ route('dosen.update', $dosens->id ) }}" method="POST">
        @csrf
        @method('PUT')
        Nama: <input type="int" name="nama" placeholder="Nama" required><br>
        Nip: <input type="text" name="nip" placeholder="Nip" required><br>
        Jabatan: <input type="text" name="jabatan" required="Jabatan" requires><br>
        <input type="submit" value="Update">

    </form>
</div>

@endsection