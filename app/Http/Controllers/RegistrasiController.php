<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        if (auth()->user()->role_name == 'Admin') {
            // Kalau Admin, hanya tampilkan User saja (tanpa Super Admin)
            $users = Registrasi::where('role_name', 'User')->get();
        } else {
            // Kalau Super Admin, tampilkan semua
            $users = Registrasi::all();
        }

        return view('registrasi.index', compact('users'));
    }


    // Menampilkan form registrasi user baru
    public function create()
    {
        return view('registrasi.create');
    }

    // Menyimpan user baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Validasi di tabel users
            'password' => 'required|string|min:8|confirmed',
            'role_name' => 'nullable|in:Super Admin,Admin,User',
        ]);

        Registrasi::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_name' => $request->role_name ?? 'User', // Default ke 'User' jika kosong
        ]);

        return redirect()->route('registrasi.index')->with('success', 'User created successfully.');
    }

    // Menampilkan detail user
    public function show(Registrasi $registrasi)
    {
        return view('registrasi.show', compact('registrasi'));
    }

    // Menampilkan form edit user
    public function edit(Registrasi $registrasi)
    {
        return view('registrasi.edit', compact('registrasi'));
    }

    // Mengupdate data user di database
    public function update(Request $request, Registrasi $registrasi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $registrasi->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_name' => 'nullable|in:Super Admin,Admin,User',
        ]);

        $registrasi->name = $request->name;
        $registrasi->email = $request->email;

        if ($request->filled('password')) {
            $registrasi->password = Hash::make($request->password);
        }

        $registrasi->role_name = $request->role_name ?? 'User'; // Default 'User' jika kosong
        $registrasi->save();

        return redirect()->route('registrasi.index')->with('success', 'User updated successfully.');
    }

    // Menghapus user dari database
    public function destroy(Registrasi $registrasi)
    {
        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('success', 'User deleted successfully.');
    }
}
