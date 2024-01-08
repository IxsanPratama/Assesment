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
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <body>
            <br>
            <a href= "{{ route('dosen.index') }}" class="btn btn-primary">Home</a>
            <a href= "{{ route('dosen.create') }}" class="btn btn-primary">Tambahkan Dosen</a>
            @yield('content')
            </div>
        </body>
        <tbody>

            @foreach ($dosens as $item)
            <tr>
                <td>{{ $item->id }} </td>
                <td>{{ $item->nama }} </td>
                <td>{{ $item->jabatan }} </td>
                <td>
                    <a href="{{  route('dosen.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{  route('dosen.destroy', $item->id) }}" method="POST">
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