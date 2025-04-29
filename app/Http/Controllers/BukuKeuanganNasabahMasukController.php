<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BukuKeuanganNasabahMasuk;
use App\Models\DataNasabah;
use App\Models\KlasifikasiSampah;
use Illuminate\Http\Request;
use PDF; // Tambahkan di bagian atas file controller

class BukuKeuanganNasabahMasukController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role_name === 'User') {
            // Ambil hanya data pemasukan nasabah milik user ini
            $pemasukan = BukuKeuanganNasabahMasuk::with(['nasabah', 'klasifikasiSampah'])
                ->whereHas('nasabah', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->latest()
                ->get();
        } elseif ($user->role_name === 'Admin') {
            // Cari Ketua RW berdasarkan user login
            $ketuaRw = \App\Models\KetuaRw::where('user_id', $user->id)->first();

            // Jika ditemukan, filter berdasarkan nama_rw_id
            if ($ketuaRw) {
                $pemasukan = BukuKeuanganNasabahMasuk::with(['nasabah', 'klasifikasiSampah'])
                    ->whereHas('nasabah', function ($query) use ($ketuaRw) {
                        $query->where('nama_rw_id', $ketuaRw->nama_rw_id);
                    })
                    ->latest()
                    ->get();
            } else {
                // Kalau tidak ditemukan, kembalikan kosong
                $pemasukan = collect(); // Kosong
            }
        } else {
            // Super Admin atau lainnya bisa lihat semua
            $pemasukan = BukuKeuanganNasabahMasuk::with(['nasabah', 'klasifikasiSampah'])
                ->latest()
                ->get();
        }

        return view('buku_keuangan_nasabah_masuk.index', compact('pemasukan'));
    }


    public function create()
    {
        $nasabahs = DataNasabah::all();
        $klasifikasiSampahs = KlasifikasiSampah::all();
        return view('buku_keuangan_nasabah_masuk.create', compact('nasabahs', 'klasifikasiSampahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_nasabah_id' => 'required|exists:data_nasabah,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'jumlah_berat' => 'required|numeric|min:0',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        // Ambil harga beli dari klasifikasi sampah
        $klasifikasi = KlasifikasiSampah::findOrFail($request->klasifikasi_sampah_id);
        $harga_beli = $klasifikasi->harga_beli;

        // Hitung jumlah masuk (harga beli * berat)
        $jumlah_masuk = $harga_beli * $request->jumlah_berat;

        BukuKeuanganNasabahMasuk::create([
            'data_nasabah_id' => $request->data_nasabah_id,
            'klasifikasi_sampah_id' => $request->klasifikasi_sampah_id,
            'jumlah_berat' => $request->jumlah_berat,
            'jumlah_masuk' => $jumlah_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('buku_keuangan_nasabah_masuk.index')->with('success', 'Data pemasukan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pemasukan = BukuKeuanganNasabahMasuk::with('nasabah', 'klasifikasiSampah')->findOrFail($id);
        return view('buku_keuangan_nasabah_masuk.show', compact('pemasukan'));
    }

    public function edit($id)
    {
        $pemasukan = BukuKeuanganNasabahMasuk::findOrFail($id);
        $nasabahs = DataNasabah::all();
        $klasifikasiSampahs = KlasifikasiSampah::all();
        return view('buku_keuangan_nasabah_masuk.edit', compact('pemasukan', 'nasabahs', 'klasifikasiSampahs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data_nasabah_id' => 'required|exists:data_nasabah,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'jumlah_berat' => 'required|numeric|min:0',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $pemasukan = BukuKeuanganNasabahMasuk::findOrFail($id);

        // Ambil harga beli dari klasifikasi sampah
        $klasifikasi = KlasifikasiSampah::findOrFail($request->klasifikasi_sampah_id);
        $harga_beli = $klasifikasi->harga_beli;

        // Hitung jumlah masuk (harga beli * berat)
        $jumlah_masuk = $harga_beli * $request->jumlah_berat;

        $pemasukan->update([
            'data_nasabah_id' => $request->data_nasabah_id,
            'klasifikasi_sampah_id' => $request->klasifikasi_sampah_id,
            'jumlah_berat' => $request->jumlah_berat,
            'jumlah_masuk' => $jumlah_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('buku_keuangan_nasabah_masuk.index')->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemasukan = BukuKeuanganNasabahMasuk::findOrFail($id);
        $pemasukan->delete();

        return redirect()->route('buku_keuangan_nasabah_masuk.index')->with('success', 'Data pemasukan berhasil dihapus.');
    }
    public function cetakPdf($id)
{
    $pemasukan = BukuKeuanganNasabahMasuk::with(['nasabah', 'klasifikasiSampah'])->findOrFail($id);

    $pdf = PDF::loadView('buku_keuangan_nasabah_masuk.pdf', compact('pemasukan'));

    return $pdf->download('pemasukan_nasabah_'.$id.'.pdf');
}
}
