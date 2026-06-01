<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🛡️ Data Permission
        </h2>
    </x-slot>

    <div class="py-6">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
                <h3 style="font-size:22px;font-weight:bold;color:#1f2937;">
                    Daftar Permission
                </h3>
                <p style="color:#6b7280;margin-top:5px;">
                    Mengelola hak akses sistem.
                </p>
            </div>

            <a href="{{ route('permission.create') }}"
               style="background:#2563eb;color:white;padding:12px 18px;border-radius:8px;text-decoration:none;font-weight:bold;">
                + Tambah Permission
            </a>
        </div>

        <div style="background:white;border-radius:14px;box-shadow:0 6px 18px rgba(0,0,0,0.08);overflow:hidden;">

            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#1f2937;color:white;">
                        <th style="padding:14px;">No</th>
                        <th style="padding:14px;">Permission</th>
                        <th style="padding:14px;text-align:center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($permissions as $permission)

                    <tr style="border-bottom:1px solid #e5e7eb;">

                        <td style="padding:14px;">
                            {{ $loop->iteration }}
                        </td>

                        <td style="padding:14px;">
                            <span style="
                            background:#dbeafe;
                            color:#1d4ed8;
                            padding:6px 12px;
                            border-radius:20px;
                            font-weight:bold;">
                                {{ $permission->name }}
                            </span>
                        </td>

                        <td style="padding:14px;text-align:center;">

                            <a href="{{ route('permission.edit', $permission->id) }}"
                               style="background:#f59e0b;color:white;padding:8px 12px;border-radius:8px;text-decoration:none;">
                                Edit
                            </a>

                            <form action="{{ route('permission.destroy', $permission->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin mau hapus permission ini?')"
                                    style="background:#dc2626;color:white;padding:8px 12px;border:none;border-radius:8px;cursor:pointer;">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="3" style="padding:30px;text-align:center;color:#6b7280;">
                            Belum ada data permission.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>