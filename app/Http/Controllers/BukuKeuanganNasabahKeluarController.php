<?php

namespace App\Http\Controllers;

use App\Models\BukuKeuanganNasabahKeluar;
use App\Models\BukuKeuanganNasabahMasuk;
use Illuminate\Http\Request;

class BukuKeuanganNasabahKeluarController extends Controller
{
    public function index()
    {
        // Mengambil semua data BukuKeuanganNasabahKeluar
        $bukuKeuanganNasabahKeluar = BukuKeuanganNasabahKeluar::with('bukuKeuanganMasuk')->paginate(10);

        // Mengirim data ke view
        return view('buku_keuangan_keluar.index', compact('bukuKeuanganNasabahKeluar'));
    }

    public function create($id_masuk)
    {
        // Mengambil data BukuKeuanganNasabahMasuk berdasarkan ID
        $bukuKeuanganNasabahMasuk = BukuKeuanganNasabahMasuk::findOrFail($id_masuk);

        // Mengirim data ke view create
        return view('buku_keuangan_keluar.create', compact('bukuKeuanganNasabahMasuk'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'buku_keuangan_nasabah_masuk_id' => 'required|exists:buku_keuangan_nasabah_masuk,id',
            'jumlah_berat' => 'required|numeric',
            'jumlah_keluar' => 'required|numeric',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        // Menyimpan data BukuKeuanganNasabahKeluar
        BukuKeuanganNasabahKeluar::create($request->all());

        // Redirect ke halaman index
        return redirect()->route('buku-keuangan-nasabah-keluar.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        // Mengambil data BukuKeuanganNasabahKeluar berdasarkan ID
        $bukuKeuanganNasabahKeluar = BukuKeuanganNasabahKeluar::findOrFail($id);

        // Mengirim data ke view edit
        return view('buku_keuangan_keluar.edit', compact('bukuKeuanganNasabahKeluar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jumlah_berat' => 'required|numeric',
            'jumlah_keluar' => 'required|numeric',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        // Menemukan dan mengupdate data BukuKeuanganNasabahKeluar
        $bukuKeuanganNasabahKeluar = BukuKeuanganNasabahKeluar::findOrFail($id);
        $bukuKeuanganNasabahKeluar->update($request->all());

        // Redirect ke halaman index
        return redirect()->route('buku-keuangan-nasabah-keluar.index')->with('success', 'Data berhasil diperbarui');
    }

    public function show($id)
    {
        // Menampilkan detail BukuKeuanganNasabahKeluar berdasarkan ID
        $bukuKeuanganNasabahKeluar = BukuKeuanganNasabahKeluar::findOrFail($id);

        // Kirim data ke view show
        return view('buku_keuangan_keluar.show', compact('bukuKeuanganNasabahKeluar'));
    }

    public function destroy($id)
    {
        // Menghapus data BukuKeuanganNasabahKeluar berdasarkan ID
        $bukuKeuanganNasabahKeluar = BukuKeuanganNasabahKeluar::findOrFail($id);
        $bukuKeuanganNasabahKeluar->delete();

        // Redirect ke halaman index
        return redirect()->route('buku-keuangan-nasabah-keluar.index')->with('success', 'Data berhasil dihapus');
    }
}
