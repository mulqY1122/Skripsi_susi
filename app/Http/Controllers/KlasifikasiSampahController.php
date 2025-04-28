<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiSampah;
use Illuminate\Http\Request;

class KlasifikasiSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan semua data klasifikasi sampah
        $data = KlasifikasiSampah::all();
        return view('klasifikasi_sampah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan form untuk membuat data baru
        return view('klasifikasi_sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'kategori_sampah' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kg' => 'nullable|numeric|min:0',    // <-- Tambahkan validasi kg
            'harga' => 'nullable|numeric|min:0', // <-- Tambahkan validasi harga
        ]);

        // Simpan data ke database
        KlasifikasiSampah::create($request->all());

        return redirect()->route('klasifikasi_sampah.index')
            ->with('success', 'Data klasifikasi sampah berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KlasifikasiSampah  $klasifikasiSampah
     * @return \Illuminate\Http\Response
     */
    public function show(KlasifikasiSampah $klasifikasiSampah)
    {
        // Menampilkan data spesifik
        return view('klasifikasi_sampah.show', compact('klasifikasiSampah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KlasifikasiSampah  $klasifikasiSampah
     * @return \Illuminate\Http\Response
     */
    public function edit(KlasifikasiSampah $klasifikasiSampah)
    {
        // Menampilkan form untuk mengedit data
        return view('klasifikasi_sampah.edit', compact('klasifikasiSampah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KlasifikasiSampah  $klasifikasiSampah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KlasifikasiSampah $klasifikasiSampah)
    {
        // Validasi input
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'kategori_sampah' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kg' => 'nullable|numeric|min:0',    // <-- Tambahkan validasi kg
            'harga' => 'nullable|numeric|min:0', // <-- Tambahkan validasi harga
        ]);

        // Update data di database
        $klasifikasiSampah->update($request->all());

        return redirect()->route('klasifikasi_sampah.index')
            ->with('success', 'Data klasifikasi sampah berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KlasifikasiSampah  $klasifikasiSampah
     * @return \Illuminate\Http\Response
     */
    public function destroy(KlasifikasiSampah $klasifikasiSampah)
    {
        // Hapus data dari database
        $klasifikasiSampah->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('klasifikasi_sampah.index')
            ->with('success', 'Data klasifikasi sampah berhasil dihapus.');
    }
}
