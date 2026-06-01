<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::latest()->paginate(10);
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
            'no_hp' => 'nullable',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
            'no_hp' => 'nullable',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}