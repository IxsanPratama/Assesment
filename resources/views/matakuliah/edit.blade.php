@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Data Mata Kuliah</h1>
    {{-- @if (session('success'))
    <div class="alert alert-success">session('success')
    </div>
    @endif --}}
    
    <form action="{{ route('matakuliah.update', $matakuliahs->id ) }}" method="POST">
        @csrf
        @method('PUT')
        Kode: <input type="int" name="kode" placeholder="Kode" required><br>
        Matakuliah: <input type="text" name="matakuliah" placeholder="Matakuliah" required><br>
        Kelas: <input type="text" name="kelas" required="Kelas" requires><br>
        <input type="submit" value="Update">

    </form>
</div>

@endsection