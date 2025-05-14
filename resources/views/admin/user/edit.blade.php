@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Staff</h2>
    <form action="{{ route('users.update', $staff->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ $staff->name }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ $staff->email }}">
        </div>
        <div class="mb-3">
            <label>Password Baru (Opsional)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-warning" type="submit">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
