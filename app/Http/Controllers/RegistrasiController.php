<?php

namespace App\Http\Controllers;

use App\Models\User; // Impor model User
use App\Models\NamaRw; // Impor model NamaRw jika ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Impor Hash untuk enkripsi password
use Illuminate\Routing\Controller;

class RegistrasiController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        // Jika yang login adalah Admin
        if (auth()->user()->role_name == 'Admin') {
            // Ambil 'nama_rw_id' dari Admin yang login
            $namaRwId = auth()->user()->nama_rw_id;

            // Hanya tampilkan User dengan 'nama_rw_id' yang sesuai
            $users = User::where('role_name', 'User') // Filter hanya User
                ->where('nama_rw_id', $namaRwId) // Filter berdasarkan 'nama_rw_id'
                ->with('namaRw') // Memuat relasi 'namaRw'
                ->get();
        } else {
            // Jika yang login adalah Super Admin, tampilkan semua User
            $users = User::with('namaRw')->get();
        }

        return view('registrasi.index', compact('users'));
    }



    // Menampilkan form registrasi user baru
    public function create()
    {
        $namaRws = NamaRw::all(); // Ambil semua Nama RW
        return view('registrasi.create', compact('namaRws'));
    }

    // Menyimpan user baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_name' => 'nullable|in:Super Admin,Admin,User',
            'nama_rw_id' => 'required|exists:nama_rw,id',
        ]);

        // Simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_name' => $request->role_name ?? 'User',
            'nama_rw_id' => $request->nama_rw_id,
        ]);

        return redirect()->route('registrasi.index')->with('success', 'User created successfully.');
    }

    // Menampilkan detail user
    public function show(User $registrasi)
    {
        return view('registrasi.show', compact('registrasi'));
    }

    // Menampilkan form edit user
    public function edit(User $registrasi)
    {
        $namaRws = NamaRw::all();
        return view('registrasi.edit', compact('registrasi', 'namaRws'));
    }

    public function update(Request $request, User $registrasi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $registrasi->id,
            'password' => 'nullable|string|min:8|confirmed',
            'nama_rw_id' => 'required|exists:nama_rw,id',
        ]);

        $registrasi->name = $request->name;
        $registrasi->email = $request->email;

        if ($request->filled('password')) {
            $registrasi->password = Hash::make($request->password);
        }

        $registrasi->nama_rw_id = $request->nama_rw_id;
        $registrasi->save();

        return redirect()->route('registrasi.index')->with('success', 'User updated successfully.');
    }


    // Menghapus user dari database
    public function destroy(User $registrasi)
    {
        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('success', 'User deleted successfully.');
    }
}
