<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UnitController extends Controller
{
    /**
     * Display a listing of the units.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::with('user')->get();
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(); // ambil semua user
        return view('units.create', compact('users'));
    }

    /**
     * Store a newly created unit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'nama_rw' => 'required|string|max:255',
            'nama_unit_bank_sampah' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jumlah_nasabah' => 'required|integer',
        ]);

        Unit::create($request->all());

        return redirect()->route('units.index')
            ->with('success', 'Unit berhasil ditambahkan.');
    }

    /**
     * Display the specified unit.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $users = User::all(); // ambil semua user
        return view('units.show', compact('unit', 'users'));
    }

    /**
     * Show the form for editing the specified unit.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $users = User::all(); // ambil semua user
        return view('units.edit', compact('unit', 'users'));
    }
    /**
     * Update the specified unit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'nama_rw' => 'required|string|max:255',
            'nama_unit_bank_sampah' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jumlah_nasabah' => 'required|integer',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')
            ->with('success', 'Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified unit from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')
            ->with('success', 'Unit berhasil dihapus.');
    }
}
