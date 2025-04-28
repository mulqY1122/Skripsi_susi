<?php

namespace App\Http\Controllers;

use App\Models\RekapSampah;
use App\Models\Unit;
use App\Models\KlasifikasiSampah;
use Illuminate\Http\Request;

class RekapSampahController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $rekap = RekapSampah::with(['unit', 'klasifikasiSampah'])->latest()->get();
        return view('rekap_sampah.index', compact('rekap'));
    }

    // Form tambah data
    public function create()
    {
        $units = Unit::all();
        $klasifikasi = KlasifikasiSampah::all();
        return view('rekap_sampah.create', compact('units', 'klasifikasi'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'nama_sampah' => 'required|string|max:255',
            'volume_sampah' => 'required|numeric',
            'harga_sampah' => 'required|numeric',
            'dokumentasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $totalHarga = $request->volume_sampah * $request->harga_sampah;

        $data = $request->all();
        $data['total_harga'] = $totalHarga;

        if ($request->hasFile('dokumentasi')) {
            $file = $request->file('dokumentasi');
            $filePath = $file->store('dokumentasi_sampah', 'public');
            $data['dokumentasi'] = $filePath;
        }

        RekapSampah::create($data);

        return redirect()->route('rekap_sampah.index')->with('success', 'Data rekap sampah berhasil ditambahkan!');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $rekap = RekapSampah::with(['unit', 'klasifikasiSampah'])->findOrFail($id);
        return view('rekap_sampah.show', compact('rekap'));
    }

    // Form edit
    public function edit($id)
    {
        $rekap = RekapSampah::findOrFail($id);
        $units = Unit::all();
        $klasifikasi = KlasifikasiSampah::all();
        return view('rekap_sampah.edit', compact('rekap', 'units', 'klasifikasi'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'nama_sampah' => 'required|string|max:255',
            'volume_sampah' => 'required|numeric',
            'harga_sampah' => 'required|numeric',
            'dokumentasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $rekap = RekapSampah::findOrFail($id);
        $totalHarga = $request->volume_sampah * $request->harga_sampah;

        $data = $request->all();
        $data['total_harga'] = $totalHarga;

        if ($request->hasFile('dokumentasi')) {
            $file = $request->file('dokumentasi');
            $filePath = $file->store('dokumentasi_sampah', 'public');
            $data['dokumentasi'] = $filePath;
        }

        $rekap->update($data);

        return redirect()->route('rekap_sampah.index')->with('success', 'Data rekap sampah berhasil diupdate!');
    }


    // Hapus data
    public function destroy($id)
    {
        $rekap = RekapSampah::findOrFail($id);
        $rekap->delete();

        return redirect()->route('rekap_sampah.index')->with('success', 'Data berhasil dihapus!');
    }
}
