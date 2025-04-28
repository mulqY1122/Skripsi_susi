<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NamaRw;
use App\Models\KetuaRw;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KetuaRwController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_name === 'Admin') {
            // Tampilkan data terkait user yang login saja
            $data = KetuaRw::with(['user', 'namaRw'])
                ->where('user_id', auth()->user()->id)
                ->get();
        } else {
            // Tampilkan semua data jika bukan admin (misalnya Super Admin)
            $data = KetuaRw::with(['user', 'namaRw'])->get();
        }

        return view('ketua_rw.index', compact('data'));
    }


    public function create()
    {
        // Ambil user yang role-nya Admin
        $users = User::where('role_name', 'Admin')->get();
        // Ambil semua RW
        $namaRwList = NamaRw::all();
        return view('ketua_rw.create', compact('users', 'namaRwList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_rw_id' => 'required|exists:nama_rw,id',
            'no_telpon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);

        KetuaRw::create($request->all());

        return redirect()->route('ketua-rw.index')->with('success', 'Data Ketua RW berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = KetuaRw::with(['user', 'namaRw'])->findOrFail($id);
        return view('ketua_rw.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KetuaRw::findOrFail($id);
        $users = User::where('role_name', 'Admin')->get();
        $namaRwList = NamaRw::all();
        return view('ketua_rw.edit', compact('data', 'users', 'namaRwList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_rw_id' => 'required|exists:nama_rw,id',
            'no_telpon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);

        $data = KetuaRw::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('ketua-rw.index')->with('success', 'Data Ketua RW berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = KetuaRw::findOrFail($id);
        $data->delete();

        return redirect()->route('ketua-rw.index')->with('success', 'Data Ketua RW berhasil dihapus.');
    }
}
