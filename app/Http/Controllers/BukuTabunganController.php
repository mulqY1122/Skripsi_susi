<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataNasabah;
use App\Models\BukuTabungan;
use Illuminate\Http\Request;
use App\Models\KlasifikasiSampah;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Routing\Controller;

class BukuTabunganController extends Controller
{
    /**
     * Menampilkan daftar buku tabungan.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role_name === 'User') {
            // Ambil hanya buku tabungan milik user ini
            $bukuTabungans = BukuTabungan::with(['dataNasabah', 'klasifikasiSampah'])
                ->whereHas('dataNasabah', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->get();
        } elseif ($user->role_name === 'Admin') {
            // Cari Ketua RW berdasarkan user login
            $ketuaRw = \App\Models\KetuaRw::where('user_id', $user->id)->first();

            // Jika ditemukan, filter berdasarkan nama_rw_id
            if ($ketuaRw) {
                $bukuTabungans = BukuTabungan::with(['dataNasabah', 'klasifikasiSampah'])
                    ->whereHas('dataNasabah', function ($query) use ($ketuaRw) {
                        $query->where('nama_rw_id', $ketuaRw->nama_rw_id);
                    })
                    ->get();
            } else {
                // Kalau tidak ditemukan, kembalikan kosong
                $bukuTabungans = collect(); // Kosong
            }
        } else {
            // Super Admin atau lainnya bisa lihat semua
            $bukuTabungans = BukuTabungan::with(['dataNasabah', 'klasifikasiSampah'])->get();
        }

        return view('buku_tabungan.index', compact('bukuTabungans'));
    }



    /**
     * Menampilkan form untuk membuat buku tabungan baru.
     */
    public function create()
    {
        // Mengambil data nasabah dan klasifikasi sampah untuk dropdown
        $dataNasabahs = DataNasabah::all();
        $klasifikasiSampahs = KlasifikasiSampah::all();

        // Menampilkan ke view
        return view('buku_tabungan.create', compact('dataNasabahs', 'klasifikasiSampahs'));
    }

    /**
     * Menyimpan buku tabungan yang baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_nasabah_id' => 'required|exists:data_nasabah,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'tanggal' => 'required|date',
            'kg' => 'required|numeric',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        // Hitung saldo otomatis
        $saldo = $request->debit - $request->kredit;

        // Simpan data
        BukuTabungan::create([
            ...$request->except('saldo'), // abaikan input saldo
            'saldo' => $saldo,
        ]);

        return redirect()->route('buku_tabungan.index')->with('success', 'Buku tabungan berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail buku tabungan.
     */
    public function show($id)
    {
        // Mengambil buku tabungan berdasarkan ID
        $bukuTabungan = BukuTabungan::with(['dataNasabah', 'klasifikasiSampah'])->findOrFail($id);

        // Menampilkan ke view
        return view('buku_tabungan.show', compact('bukuTabungan'));
    }

    /**
     * Menampilkan form untuk mengedit buku tabungan.
     */
    public function edit($id)
    {
        // Mengambil buku tabungan berdasarkan ID
        $bukuTabungan = BukuTabungan::findOrFail($id);

        // Mengambil data nasabah dan klasifikasi sampah untuk dropdown
        $dataNasabahs = DataNasabah::all();
        $klasifikasiSampahs = KlasifikasiSampah::all();

        // Menampilkan ke view
        return view('buku_tabungan.edit', compact('bukuTabungan', 'dataNasabahs', 'klasifikasiSampahs'));
    }

    /**
     * Memperbarui buku tabungan yang ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'data_nasabah_id' => 'required|exists:data_nasabah,id',
            'klasifikasi_sampah_id' => 'required|exists:klasifikasi_sampah,id',
            'tanggal' => 'required|date',
            'kg' => 'required|numeric',
            'debit' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        $bukuTabungan = BukuTabungan::findOrFail($id);
        $saldo = $request->debit - $request->kredit;

        $bukuTabungan->update([
            ...$request->except('saldo'),
            'saldo' => $saldo,
        ]);

        return redirect()->route('buku_tabungan.index')->with('success', 'Buku tabungan berhasil diperbarui.');
    }


    /**
     * Menghapus buku tabungan.
     */
    public function destroy($id)
    {
        // Mengambil buku tabungan berdasarkan ID
        $bukuTabungan = BukuTabungan::findOrFail($id);

        // Menghapus buku tabungan
        $bukuTabungan->delete();

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect()->route('buku_tabungan.index')->with('success', 'Buku tabungan berhasil dihapus.');
    }
    public function exportPdf($id)
    {
        // Mengambil buku tabungan berdasarkan ID
        $bukuTabungan = BukuTabungan::with(['dataNasabah', 'klasifikasiSampah'])->findOrFail($id);

        // Mendefinisikan view yang akan digunakan untuk generate PDF
        $pdf = FacadePdf::loadView('buku_tabungan.export_pdf', compact('bukuTabungan'));

        // Menghasilkan PDF dan langsung mengunduhnya
        return $pdf->download('buku_tabungan_' . $id . '.pdf');
    }
}
