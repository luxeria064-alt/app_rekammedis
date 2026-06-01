<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with(['pasien', 'dokter'])->latest()->paginate(10);
        return view('rekam_medis.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('rekam_medis.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal_periksa' => 'required|date',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'nullable',
            'resep_obat' => 'nullable',
        ]);

        RekamMedis::create($request->all());

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Data rekam medis berhasil ditambahkan.');
    }

    public function edit(RekamMedis $rekamMedi)
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('rekam_medis.edit', [
            'rekamMedis' => $rekamMedi,
            'pasiens' => $pasiens,
            'dokters' => $dokters,
        ]);
    }

    public function update(Request $request, RekamMedis $rekamMedi)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal_periksa' => 'required|date',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'nullable',
            'resep_obat' => 'nullable',
        ]);

        $rekamMedi->update($request->all());

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Data rekam medis berhasil diperbarui.');
    }

    public function destroy(RekamMedis $rekamMedi)
    {
        $rekamMedi->delete();

        return redirect()->route('rekam-medis.index')
            ->with('success', 'Data rekam medis berhasil dihapus.');
    }
}