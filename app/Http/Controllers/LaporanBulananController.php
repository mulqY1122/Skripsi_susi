<?php

namespace App\Http\Controllers;

use App\Models\LaporanBulanan;
use App\Models\KetuaRw;
use App\Models\KlasifikasiSampah;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Models\User;


class LaporanBulananController extends Controller
{
    // Tampilkan semua laporan

    public function index()
    {
        $user = auth()->user();

        if ($user->role_name === 'Super Admin') {
            // Super Admin bisa melihat semua laporan
            $laporanBulanan = \App\Models\LaporanBulanan::with(['ketuaRw.user', 'klasifikasiSampah'])
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy(function ($item) {
                    return \Carbon\Carbon::parse($item->created_at)->format('F Y');
                });
        } elseif ($user->role_name === 'Admin') {
            // Admin hanya lihat data RW miliknya
            $ketuaRw = \App\Models\KetuaRw::where('user_id', $user->id)->first();

            if ($ketuaRw) {
                $laporanBulanan = \App\Models\LaporanBulanan::with(['ketuaRw.user', 'klasifikasiSampah'])
                    ->where('ketua_rw_id', $ketuaRw->id)
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->groupBy(function ($item) {
                        return \Carbon\Carbon::parse($item->created_at)->format('F Y');
                    });
            } else {
                $laporanBulanan = collect();
            }
        } else {
            // Role lainnya tetap bisa lihat semua
            $laporanBulanan = \App\Models\LaporanBulanan::with(['ketuaRw.user', 'klasifikasiSampah'])
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy(function ($item) {
                    return \Carbon\Carbon::parse($item->created_at)->format('F Y');
                });
        }

        return view('laporan_bulanan.index', compact('laporanBulanan'));
    }



    // Form tambah laporan
    public function create()
    {
        $ketuaRw = KetuaRw::all();
        $klasifikasiSampah = KlasifikasiSampah::all();
        return view('laporan_bulanan.create', compact('ketuaRw', 'klasifikasiSampah'));
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
            'ketua_rw_id' => 'required|exists:ketua_rw,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'nama_sampah' => 'required|string|max:255',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Hitung total harga otomatis
        $total_harga = $request->berat * $request->harga;

        // Simpan ke database
        LaporanBulanan::create([
            'nama_unit' => $request->nama_unit,
            'ketua_rw_id' => $request->ketua_rw_id,
            'klasifikasi_sampah_id' => $request->klasifikasi_sampah_id,
            'nama_sampah' => $request->nama_sampah,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'total_harga' => $total_harga,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('laporan_bulanan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }



    // Tampilkan detail laporan
    public function show($id)
    {
        $laporan = LaporanBulanan::with('ketuaRw', 'klasifikasiSampah')->findOrFail($id);
        return view('laporan_bulanan.show', compact('laporan'));
    }

    // Form edit laporan
    public function edit($id)
    {
        $laporan = LaporanBulanan::findOrFail($id);
        $ketuaRw = KetuaRw::all();
        $klasifikasiSampah = KlasifikasiSampah::all();
        return view('laporan_bulanan.edit', compact('laporan', 'ketuaRw', 'klasifikasiSampah'));
    }

    // Update laporan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
            'ketua_rw_id' => 'required|exists:ketua_rw,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'nama_sampah' => 'required|string|max:255',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $laporan = LaporanBulanan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporan_bulanan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = LaporanBulanan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan_bulanan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    public function laporanJenisSampah()
    {
        // Ambil data dan group berdasarkan bulan dari created_at
        $laporanJenisSampah = LaporanBulanan::with('klasifikasiSampah')
            ->selectRaw('klasifikasi_sampah_id, SUM(berat) as total_berat, SUM(total_harga) as total_harga, DATE_FORMAT(created_at, "%Y-%m") as bulan')
            ->groupBy('klasifikasi_sampah_id', 'bulan')
            ->orderBy('bulan', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->bulan . '-01')->format('F Y'); // contoh: "April 2025"
            });

        return view('laporan.laporan_jenis_sampah', compact('laporanJenisSampah'));
    }
}
