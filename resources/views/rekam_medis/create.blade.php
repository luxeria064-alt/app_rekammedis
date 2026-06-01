<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Rekam Medis
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow rounded">

                <form action="{{ route('rekam-medis.store') }}" method="POST">
                    @csrf

                    <div style="margin-bottom:15px;">
                        <label>Pasien</label>
                        <select name="pasien_id" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                            @foreach ($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->nama }} - {{ $pasien->no_rm }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Dokter</label>
                        <select name="dokter_id" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }} - {{ $dokter->spesialis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Tanggal Periksa</label>
                        <input type="date" name="tanggal_periksa"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Keluhan</label>
                        <textarea name="keluhan" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;"></textarea>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Diagnosa</label>
                        <textarea name="diagnosa" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;"></textarea>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Tindakan</label>
                        <textarea name="tindakan" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;"></textarea>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Resep Obat</label>
                        <textarea name="resep_obat" style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;"></textarea>
                    </div>

                    <button type="submit"
                        style="background:#16a34a;color:white;padding:10px 20px;border:none;border-radius:5px;">
                        Simpan Rekam Medis
                    </button>

                    <a href="{{ route('rekam-medis.index') }}"
                       style="background:#dc2626;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;margin-left:10px;">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>