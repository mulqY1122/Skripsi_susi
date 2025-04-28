<?php

namespace App\Http\Controllers;

use App\Models\NamaRw;
use Illuminate\Http\Request;

class NamaRwController extends Controller
{
    // Tampilkan semua data RW
    public function index()
    {
        $data = NamaRw::all();
        return view('nama_rw.index', compact('data'));
    }

    // Tampilkan form tambah RW
    public function create()
    {
        return view('nama_rw.create');
    }

    // Simpan data RW baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_rw' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        NamaRw::create($request->all());

        return redirect()->route('nama_rw.index')->with('success', 'Data RW berhasil ditambahkan!');
    }

    // Tampilkan detail RW
    public function show($id)
    {
        $rw = NamaRw::findOrFail($id);
        return view('nama_rw.show', compact('rw'));
    }

    // Tampilkan form edit RW
    public function edit($id)
    {
        $rw = NamaRw::findOrFail($id);
        return view('nama_rw.edit', compact('rw'));
    }

    // Update data RW
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rw' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $rw = NamaRw::findOrFail($id);
        $rw->update($request->all());

        return redirect()->route('nama_rw.index')->with('success', 'Data RW berhasil diperbarui!');
    }

    // Hapus data RW
    public function destroy($id)
    {
        $rw = NamaRw::findOrFail($id);
        $rw->delete();

        return redirect()->route('nama_rw.index')->with('success', 'Data RW berhasil dihapus!');
    }
}
