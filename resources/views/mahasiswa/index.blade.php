@extends('layouts.master')

@section('content')
<div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover"  border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Action</th>
            </tr>
        </thead>
        <body>
            <br>
            <a href= "{{ route('mahasiswa.index') }}" class="btn btn-primary">Home</a>
            <a href= "{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambahkan Mahasiswa</a>
            @yield('content')
            </div>
        </body>
        <tbody>
            @foreach ($mahasiswas as $item)
            <tr>
                <td>{{ $item->id }} </td>
                <td>{{ $item->nim }} </td>
                <td>{{ $item->nama }} </td>
                <td>{{ $item->prodi }} </td>
                <td>
                    <a href="{{  route('mahasiswa.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{  route('mahasiswa.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection