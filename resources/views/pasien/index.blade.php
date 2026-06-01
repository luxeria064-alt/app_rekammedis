<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            👥 Data Pasien
        </h2>
    </x-slot>

    <div class="py-6">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
                <h3 style="font-size:22px;font-weight:bold;color:#1f2937;">
                    Daftar Pasien Klinik
                </h3>
                <p style="color:#6b7280;margin-top:5px;">
                    Mengelola data pasien yang terdaftar di klinik.
                </p>
            </div>

            <a href="{{ route('pasien.create') }}"
               style="background:#2563eb;color:white;padding:12px 18px;border-radius:8px;text-decoration:none;font-weight:bold;">
                + Tambah Pasien
            </a>
        </div>

        <div style="background:white;border-radius:14px;box-shadow:0 6px 18px rgba(0,0,0,0.08);overflow:hidden;">

            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#1f2937;color:white;text-align:left;">
                        <th style="padding:14px;">No</th>
                        <th style="padding:14px;">No RM</th>
                        <th style="padding:14px;">Nama Pasien</th>
                        <th style="padding:14px;">Jenis Kelamin</th>
                        <th style="padding:14px;">No HP</th>
                        <th style="padding:14px;text-align:center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pasiens as $pasien)
                    <tr style="border-bottom:1px solid #e5e7eb;">
                        <td style="padding:14px;">
                            {{ $loop->iteration }}
                        </td>

                        <td style="padding:14px;font-weight:bold;color:#2563eb;">
                            {{ $pasien->no_rm }}
                        </td>

                        <td style="padding:14px;">
                            <b>{{ $pasien->nama }}</b>
                        </td>

                        <td style="padding:14px;">
                            @if ($pasien->jenis_kelamin == 'L')
                                <span style="background:#dbeafe;color:#1d4ed8;padding:6px 10px;border-radius:20px;font-size:13px;font-weight:bold;">
                                    Laki-Laki
                                </span>
                            @else
                                <span style="background:#fce7f3;color:#be185d;padding:6px 10px;border-radius:20px;font-size:13px;font-weight:bold;">
                                    Perempuan
                                </span>
                            @endif
                        </td>

                        <td style="padding:14px;">
                            {{ $pasien->no_hp ?? '-' }}
                        </td>

                        <td style="padding:14px;text-align:center;">
                            <a href="{{ route('pasien.edit', $pasien->id) }}"
                               style="background:#f59e0b;color:white;padding:8px 12px;border-radius:8px;text-decoration:none;font-size:14px;">
                                Edit
                            </a>

                            <form action="{{ route('pasien.destroy', $pasien->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin mau hapus data pasien ini?')"
                                    style="background:#dc2626;color:white;padding:8px 12px;border:none;border-radius:8px;cursor:pointer;font-size:14px;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding:25px;text-align:center;color:#6b7280;">
                            Belum ada data pasien.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>