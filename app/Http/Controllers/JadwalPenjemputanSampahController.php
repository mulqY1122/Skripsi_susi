<?php

namespace App\Http\Controllers;

use App\Models\JadwalPenjemputanSampah;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalPenjemputanSampahController extends Controller
{
    public function index()
    {
        $jadwals = JadwalPenjemputanSampah::orderBy('tanggal', 'asc')->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required',
            'lokasi_penjemputan' => 'required|string|max:255',
        ]);

        // Ambil hari berdasarkan tanggal
        $tanggal = Carbon::parse($request->tanggal);
        $hari = $tanggal->locale('id')->isoFormat('dddd');

        JadwalPenjemputanSampah::create([
            'tanggal' => $request->tanggal,
            'hari' => $hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir,
            'lokasi_penjemputan' => $request->lokasi_penjemputan,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show($id)
    {
        $jadwal = JadwalPenjemputanSampah::findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = JadwalPenjemputanSampah::findOrFail($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required',
            'lokasi_penjemputan' => 'required|string|max:255',
        ]);

        $jadwal = JadwalPenjemputanSampah::findOrFail($id);

        // Update hari berdasarkan tanggal yang baru
        $tanggal = Carbon::parse($request->tanggal);
        $hari = $tanggal->locale('id')->isoFormat('dddd');

        $jadwal->update([
            'tanggal' => $request->tanggal,
            'hari' => $hari,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir,
            'lokasi_penjemputan' => $request->lokasi_penjemputan,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPenjemputanSampah::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
