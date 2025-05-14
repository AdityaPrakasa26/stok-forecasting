<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua staff
    public function index()
    {
        $staffs = User::where('role', 'staff')->get();
        return view('admin.users.index', compact('staffs'));
    }

    // Tampilkan form tambah staff
    public function create()
    {
        return view('admin.users.create');
    }

    // Simpan data staff baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'staff',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Staff berhasil ditambahkan.');
    }

    // Tampilkan form edit staff
    public function edit($id)
    {
        $staff = User::findOrFail($id);
        return view('admin.users.edit', compact('staff'));
    }

    // Update data staff
    public function update(Request $request, $id)
    {
        $staff = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $staff->id,
        ]);

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $staff->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('users.index')->with('success', 'Staff berhasil diperbarui.');
    }

    // Hapus staff
    public function destroy($id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();

        return redirect()->route('users.index')->with('success', 'Staff berhasil dihapus.');
    }
}
