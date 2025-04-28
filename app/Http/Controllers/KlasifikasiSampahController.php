<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiSampah;
use Illuminate\Http\Request;

class KlasifikasiSampahController extends Controller
{
    /**
     * Tampilkan semua data klasifikasi sampah.
     */
    public function index()
    {
        $data = KlasifikasiSampah::all();
        return view('klasifikasi_sampah.index', compact('data'));
    }

    /**
     * Tampilkan form tambah data baru.
     */
    public function create()
    {
        return view('klasifikasi_sampah.create');
    }

    /**
     * Simpan data baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_sampah'   => 'required|string|max:255',
            'kategori_sampah' => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'kg'             => 'nullable|numeric|min:0',
            'harga_jual'     => 'nullable|numeric|min:0',
            'harga_beli'     => 'nullable|numeric|min:0',
        ]);

        KlasifikasiSampah::create([
            'jenis_sampah'    => $request->jenis_sampah,
            'kategori_sampah' => $request->kategori_sampah,
            'deskripsi'       => $request->deskripsi,
            'kg'              => $request->kg,
            'harga_jual'      => $request->harga_jual,
            'harga_beli'      => $request->harga_beli,
        ]);

        return redirect()->route('klasifikasi_sampah.index')
            ->with('success', 'Data klasifikasi sampah berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data.
     */
    public function show(KlasifikasiSampah $klasifikasiSampah)
    {
        return view('klasifikasi_sampah.show', compact('klasifikasiSampah'));
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit(KlasifikasiSampah $klasifikasiSampah)
    {
        return view('klasifikasi_sampah.edit', compact('klasifikasiSampah'));
    }

    /**
     * Update data yang ada di database.
     */
    public function update(Request $request, KlasifikasiSampah $klasifikasiSampah)
    {
        $request->validate([
            'jenis_sampah'   => 'required|string|max:255',
            'kategori_sampah' => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'kg'             => 'nullable|numeric|min:0',
            'harga_jual'     => 'nullable|numeric|min:0',
            'harga_beli'     => 'nullable|numeric|min:0',
        ]);

        $klasifikasiSampah->update([
            'jenis_sampah'    => $request->jenis_sampah,
            'kategori_sampah' => $request->kategori_sampah,
            'deskripsi'       => $request->deskripsi,
            'kg'              => $request->kg,
            'harga_jual'      => $request->harga_jual,
            'harga_beli'      => $request->harga_beli,
        ]);

        return redirect()->route('klasifikasi_sampah.index')
            ->with('success', 'Data klasifikasi sampah berhasil diperbarui.');
    }

    /**
     * Hapus data dari database.
     */
    public function destroy(KlasifikasiSampah $klasifikasiSampah)
    {
        $klasifikasiSampah->delete();

        return redirect()->route('klasifikasi_sampah.index')
            ->with('success', 'Data klasifikasi sampah berhasil dihapus.');
    }
}
