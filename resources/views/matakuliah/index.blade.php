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
                <th>Kode</th>
                <th>Matakuliah</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <body>
            <br>
            <a href= "{{ route('matakuliah.index') }}" class="btn btn-primary">Home</a>
            <a href= "{{ route('matakuliah.create') }}" class="btn btn-primary">Tambahkan Matakuliah</a>
            @yield('content')
            </div>
        </body>
        <tbody>

            @foreach ($matakuliahs as $item)
            <tr>
                <td>{{ $item->id }} </td>
                <td>{{ $item->kode }} </td>
                <td>{{ $item->matakuliah }} </td>
                <td>{{ $item->kelas }} </td>
                <td>
                    <a href="{{  route('matakuliah.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{  route('matakuliah.destroy', $item->id) }}" method="POST">
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