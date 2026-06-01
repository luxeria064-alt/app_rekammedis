<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            👨‍⚕️ Data Dokter
        </h2>
    </x-slot>

    <div class="py-6">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
                <h3 style="font-size:22px;font-weight:bold;color:#1f2937;">
                    Daftar Dokter Klinik
                </h3>
                <p style="color:#6b7280;margin-top:5px;">
                    Mengelola data dokter yang bertugas di klinik.
                </p>
            </div>

            <a href="{{ route('dokter.create') }}"
               style="background:#16a34a;color:white;padding:12px 18px;border-radius:8px;text-decoration:none;font-weight:bold;">
                + Tambah Dokter
            </a>
        </div>

        <div style="background:white;border-radius:14px;box-shadow:0 6px 18px rgba(0,0,0,0.08);overflow:hidden;">

            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#1f2937;color:white;text-align:left;">
                        <th style="padding:14px;">No</th>
                        <th style="padding:14px;">Nama Dokter</th>
                        <th style="padding:14px;">Spesialis</th>
                        <th style="padding:14px;">No HP</th>
                        <th style="padding:14px;text-align:center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($dokters as $dokter)
                    <tr style="border-bottom:1px solid #e5e7eb;">

                        <td style="padding:14px;">
                            {{ $loop->iteration }}
                        </td>

                        <td style="padding:14px;">
                            <b>👨‍⚕️ {{ $dokter->nama_dokter }}</b>
                        </td>

                        <td style="padding:14px;">
                            <span style="
                                background:#dcfce7;
                                color:#166534;
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:13px;
                                font-weight:bold;
                            ">
                                {{ $dokter->spesialis }}
                            </span>
                        </td>

                        <td style="padding:14px;">
                            {{ $dokter->no_hp }}
                        </td>

                        <td style="padding:14px;text-align:center;">

                            <a href="{{ route('dokter.edit', $dokter->id) }}"
                               style="
                               background:#f59e0b;
                               color:white;
                               padding:8px 12px;
                               border-radius:8px;
                               text-decoration:none;
                               font-size:14px;
                               ">
                                Edit
                            </a>

                            <form action="{{ route('dokter.destroy', $dokter->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin mau hapus data dokter ini?')"
                                    style="
                                    background:#dc2626;
                                    color:white;
                                    padding:8px 12px;
                                    border:none;
                                    border-radius:8px;
                                    cursor:pointer;
                                    font-size:14px;
                                    ">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5"
                            style="
                            text-align:center;
                            padding:30px;
                            color:#6b7280;
                            ">
                            Belum ada data dokter.
                        </td>
                    </tr>

                    @endforelse
                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>