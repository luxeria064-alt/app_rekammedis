<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Dashboard Rekam Medis Klinik
        </h2>
    </x-slot>

    <div class="py-6">

        <div style="display:flex;gap:20px;flex-wrap:wrap;">

            @role('admin')
            <div style="background:#2563eb;color:white;padding:22px;border-radius:14px;width:240px;box-shadow:0 6px 15px rgba(0,0,0,0.15);">
                <h3 style="font-size:18px;">👥 Total Pasien</h3>
                <h1 style="font-size:38px;font-weight:bold;margin-top:10px;">
                    {{ \App\Models\Pasien::count() }}
                </h1>
            </div>

            <div style="background:#16a34a;color:white;padding:22px;border-radius:14px;width:240px;box-shadow:0 6px 15px rgba(0,0,0,0.15);">
                <h3 style="font-size:18px;">👨‍⚕️ Total Dokter</h3>
                <h1 style="font-size:38px;font-weight:bold;margin-top:10px;">
                    {{ \App\Models\Dokter::count() }}
                </h1>
            </div>

            <div style="background:#dc2626;color:white;padding:22px;border-radius:14px;width:240px;box-shadow:0 6px 15px rgba(0,0,0,0.15);">
                <h3 style="font-size:18px;">📋 Total Rekam Medis</h3>
                <h1 style="font-size:38px;font-weight:bold;margin-top:10px;">
                    {{ \App\Models\RekamMedis::count() }}
                </h1>
            </div>
            @endrole

            @role('petugas')
            <div style="background:#2563eb;color:white;padding:22px;border-radius:14px;width:240px;box-shadow:0 6px 15px rgba(0,0,0,0.15);">
                <h3 style="font-size:18px;">👥 Total Pasien</h3>
                <h1 style="font-size:38px;font-weight:bold;margin-top:10px;">
                    {{ \App\Models\Pasien::count() }}
                </h1>
            </div>
            @endrole

            @role('dokter')
            <div style="background:#dc2626;color:white;padding:22px;border-radius:14px;width:240px;box-shadow:0 6px 15px rgba(0,0,0,0.15);">
                <h3 style="font-size:18px;">📋 Total Rekam Medis</h3>
                <h1 style="font-size:38px;font-weight:bold;margin-top:10px;">
                    {{ \App\Models\RekamMedis::count() }}
                </h1>
            </div>
            @endrole

        </div>

        <div style="margin-top:30px;background:white;padding:25px;border-radius:14px;box-shadow:0 5px 20px rgba(0,0,0,0.1);">
            <h3 style="font-size:24px;font-weight:bold;">
                👋 Selamat Datang, {{ Auth::user()->name }}
            </h3>

            <p style="margin-top:10px;font-size:16px;">
                Anda login sebagai:
                <b style="color:#2563eb;">
                    {{ ucfirst(Auth::user()->getRoleNames()->first()) }}
                </b>
            </p>

            <p style="margin-top:5px;color:#6b7280;">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>

            <hr style="margin:18px 0;">

            <p style="line-height:1.7;color:#374151;">
                Sistem Informasi Rekam Medis Klinik digunakan untuk mengelola data pasien,
                dokter, dan rekam medis secara cepat, rapi, dan aman berdasarkan hak akses pengguna.
            </p>
        </div>

    </div>

</x-app-layout>