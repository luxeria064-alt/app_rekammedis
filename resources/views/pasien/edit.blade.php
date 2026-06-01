<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pasien
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom:15px;">
                        <label>No RM</label>
                        <input type="text" name="no_rm" value="{{ $pasien->no_rm }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama" value="{{ $pasien->nama }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                                style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                            <option value="L" {{ $pasien->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="P" {{ $pasien->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>Alamat</label>
                        <textarea name="alamat"
                                  style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">{{ $pasien->alamat }}</textarea>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>No HP</label>
                        <input type="text" name="no_hp" value="{{ $pasien->no_hp }}"
                               style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                    </div>

                    <button type="submit"
                        style="background:#16a34a;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">
                        Update Data Pasien
                    </button>

                    <a href="{{ route('pasien.index') }}"
                       style="background:#dc2626;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;margin-left:10px;">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>