<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    // Method untuk menampilkan semua pengumuman
    public function index()
    {
        $pengumuman = Pengumuman::all(); // Mengambil semua data pengumuman
        return view('pengumuman.index', compact('pengumuman')); // Mengembalikan view dengan data pengumuman
    }

    // Method untuk menampilkan form tambah pengumuman
    public function create()
    {
        return view('pengumuman.create');
    }

    // Method untuk menyimpan pengumuman baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_pengumuman' => 'required|max:255',
            'isi_pengumuman' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'penulis_pengumuman' => 'nullable|max:255',
            'status_pengumuman' => 'required|in:Aktif,Non Aktif',
        ]);

        Pengumuman::create($validated); // Menyimpan pengumuman ke database

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    // Method untuk menampilkan detail pengumuman
    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id); // Mencari pengumuman berdasarkan id
        return view('pengumuman.show', compact('pengumuman'));
    }

    // Method untuk menampilkan form edit pengumuman
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id); // Mencari pengumuman berdasarkan id
        return view('pengumuman.edit', compact('pengumuman'));
    }

    // Method untuk memperbarui pengumuman yang sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul_pengumuman' => 'required|max:255',
            'isi_pengumuman' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'penulis_pengumuman' => 'nullable|max:255',
            'status_pengumuman' => 'required|in:Aktif,Non Aktif',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($validated); // Memperbarui pengumuman di database

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    // Method untuk menghapus pengumuman
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete(); // Menghapus pengumuman dari database

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}