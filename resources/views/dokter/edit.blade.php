<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Dokter
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow rounded">

                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom:15px;">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama_dokter"
                               value="{{ $dokter->nama_dokter }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Spesialis</label>
                        <input type="text" name="spesialis"
                               value="{{ $dokter->spesialis }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Alamat</label>
                        <textarea name="alamat"
                                  style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">{{ $dokter->alamat }}</textarea>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>No HP</label>
                        <input type="text" name="no_hp"
                               value="{{ $dokter->no_hp }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <button type="submit"
                        style="background:#16a34a;color:white;padding:10px 20px;border:none;border-radius:5px;">
                        Update Dokter
                    </button>

                    <a href="{{ route('dokter.index') }}"
                       style="background:#dc2626;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;margin-left:10px;">
                        Kembali
                    </a>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>