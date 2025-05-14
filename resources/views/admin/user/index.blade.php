@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Staff</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Staff</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th><th>Email</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
            <tr>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $staff->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus staff ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
