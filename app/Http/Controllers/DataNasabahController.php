<?php

namespace App\Http\Controllers;

use App\Models\DataNasabah;
use App\Models\User;
use App\Models\NamaRw;
use Illuminate\Http\Request;

class DataNasabahController extends Controller
{
    // Menampilkan daftar data nasabah
    public function index()
    {
        if (auth()->user()->role_name === 'User') {
            // Ambil hanya data nasabah milik user yang login
            $dataNasabah = DataNasabah::with(['user', 'namaRw'])
                ->where('user_id', auth()->user()->id)
                ->get();
        } else {
            // Jika bukan role User, tampilkan semua data
            $dataNasabah = DataNasabah::with(['user', 'namaRw'])->get();
        }

        return view('data_nasabah.index', compact('dataNasabah'));
    }


    // Menampilkan form untuk membuat data nasabah baru
    public function create()
    {
        $users = User::where('role_name', 'User')->get(); // Ambil pengguna dengan role 'User'
        $namaRws = NamaRw::all(); // Ambil semua nama RW
        return view('data_nasabah.create', compact('users', 'namaRws'));
    }

    // Menyimpan data nasabah baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_rw_id' => 'required|exists:nama_rw,id',
            'no_telepon' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dataNasabah = new DataNasabah();
        $dataNasabah->user_id = $request->user_id;
        $dataNasabah->nama_rw_id = $request->nama_rw_id;
        $dataNasabah->no_telepon = $request->no_telepon;
        $dataNasabah->jenis_kelamin = $request->jenis_kelamin;

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $dataNasabah->foto_profil = $path;
        }

        $dataNasabah->save();
        return redirect()->route('data_nasabah.index')->with('success', 'Data Nasabah berhasil disimpan.');
    }

    // Menampilkan detail data nasabah
    public function show($id)
    {
        $dataNasabah = DataNasabah::with(['user', 'namaRw'])->findOrFail($id);
        return view('data_nasabah.show', compact('dataNasabah'));
    }

    // Menampilkan form untuk mengedit data nasabah
    public function edit($id)
    {
        $dataNasabah = DataNasabah::findOrFail($id);
        $users = User::where('role_name', 'User')->get();
        $namaRws = NamaRw::all();
        return view('data_nasabah.edit', compact('dataNasabah', 'users', 'namaRws'));
    }

    // Menyimpan perubahan data nasabah yang sudah diedit
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_rw_id' => 'required|exists:nama_rw,id',
            'no_telepon' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dataNasabah = DataNasabah::findOrFail($id);
        $dataNasabah->user_id = $request->user_id;
        $dataNasabah->nama_rw_id = $request->nama_rw_id;
        $dataNasabah->no_telepon = $request->no_telepon;
        $dataNasabah->jenis_kelamin = $request->jenis_kelamin;

        if ($request->hasFile('foto_profil')) {
            // Menghapus foto lama jika ada
            if ($dataNasabah->foto_profil) {
                \Storage::delete('public/' . $dataNasabah->foto_profil);
            }

            // Menyimpan foto baru
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $dataNasabah->foto_profil = $path;
        }

        $dataNasabah->save();
        return redirect()->route('data_nasabah.index')->with('success', 'Data Nasabah berhasil diperbarui.');
    }

    // Menghapus data nasabah
    public function destroy($id)
    {
        $dataNasabah = DataNasabah::findOrFail($id);
        // Hapus foto profil jika ada
        if ($dataNasabah->foto_profil) {
            \Storage::delete('public/' . $dataNasabah->foto_profil);
        }
        $dataNasabah->delete();
        return redirect()->route('data_nasabah.index')->with('success', 'Data Nasabah berhasil dihapus.');
    }
}
