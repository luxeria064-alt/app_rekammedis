<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required|unique:pasiens,no_rm',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'nullable',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'nullable',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}