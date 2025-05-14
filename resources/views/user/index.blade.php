@extends('layouts.main')

@section('title')
Daftar User
@endsection

@section('content')
<div class="card">
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Contoh data dummy, nanti diganti pakai @foreach --}}
            <tr>
                <td>1</td>
                <td>Yazid</td>
                <td>yazdi@example.com</td>
                <td>Staff</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Hannes</td>
                <td>naga@example.com</td>
                <td>Staff</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
@endsection
