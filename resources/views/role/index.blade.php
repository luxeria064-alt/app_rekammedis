<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🔐 Data Role
        </h2>
    </x-slot>

    <div class="py-6">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
            <div>
                <h3 style="font-size:22px;font-weight:bold;color:#1f2937;">
                    Daftar Role Pengguna
                </h3>
                <p style="color:#6b7280;margin-top:5px;">
                    Mengelola role seperti admin, dokter, dan petugas.
                </p>
            </div>

            @can('role-create')
                <a href="{{ route('role.create') }}"
                   style="background:#2563eb;color:white;padding:12px 18px;border-radius:8px;text-decoration:none;font-weight:bold;">
                    + Tambah Role
                </a>
            @endcan
        </div>

        <div style="background:white;border-radius:14px;box-shadow:0 6px 18px rgba(0,0,0,0.08);overflow:hidden;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#1f2937;color:white;text-align:left;">
                        <th style="padding:14px;">No</th>
                        <th style="padding:14px;">Nama Role</th>
                        <th style="padding:14px;">Permission</th>
                        <th style="padding:14px;text-align:center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($roles as $role)
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:14px;">{{ $loop->iteration }}</td>

                            <td style="padding:14px;">
                                <span style="background:#dbeafe;color:#1d4ed8;padding:6px 12px;border-radius:20px;font-weight:bold;display:inline-block;">
                                    {{ $role->name }}
                                </span>
                            </td>

                            <td style="padding:14px;">
                                @forelse ($role->permissions as $permission)
                                    <span style="background:#dcfce7;color:#166534;padding:6px 10px;border-radius:20px;font-size:13px;font-weight:bold;display:inline-block;margin:3px;">
                                        {{ $permission->name }}
                                    </span>
                                @empty
                                    <span style="color:#9ca3af;">Belum ada permission</span>
                                @endforelse
                            </td>

                            <td style="padding:14px;text-align:center;">
                                @can('role-edit')
                                    <a href="{{ route('role.edit', $role->id) }}"
                                       style="background:#f59e0b;color:white;padding:8px 12px;border-radius:8px;text-decoration:none;">
                                        Edit
                                    </a>
                                @endcan

                                @can('role-delete')
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Yakin mau hapus role ini?')"
                                            style="background:#dc2626;color:white;padding:8px 12px;border:none;border-radius:8px;cursor:pointer;">
                                            Hapus
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding:25px;text-align:center;color:#6b7280;">
                                Belum ada data role.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>