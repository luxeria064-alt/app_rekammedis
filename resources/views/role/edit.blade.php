<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            ✏ Edit Role & Permission
        </h2>
    </x-slot>

    <div class="py-6">
        <div style="background:white;padding:25px;border-radius:14px;box-shadow:0 6px 18px rgba(0,0,0,0.08);">

            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom:25px;">
                    <label style="font-weight:bold;">Nama Role</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $role->name) }}"
                           class="w-full border rounded mt-2 p-3">

                    @error('name')
                        <p style="color:red;margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom:25px;">
                    <label style="font-weight:bold;font-size:18px;">
                        Daftar Permission
                    </label>

                    <p style="color:#6b7280;margin-top:5px;margin-bottom:15px;">
                        Centang permission yang ingin diberikan pada role ini.
                    </p>

                    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:12px;">
                        @forelse ($permissions as $permission)
                            <label style="background:#f3f4f6;padding:12px;border-radius:10px;border:1px solid #e5e7eb;cursor:pointer;display:flex;align-items:center;gap:8px;">
                                <input type="checkbox"
                                       name="permissions[]"
                                       value="{{ $permission->name }}"
                                       {{ in_array($permission->name, old('permissions', $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}>

                                <span style="font-weight:600;color:#1f2937;">
                                    {{ $permission->name }}
                                </span>
                            </label>
                        @empty
                            <p style="color:#6b7280;">
                                Belum ada permission.
                            </p>
                        @endforelse
                    </div>

                    @error('permissions')
                        <p style="color:red;margin-top:5px;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        style="background:#f59e0b;color:white;padding:10px 18px;border:none;border-radius:8px;cursor:pointer;">
                    Update Role
                </button>

                <a href="{{ route('role.index') }}"
                   style="background:#6b7280;color:white;padding:10px 18px;border-radius:8px;text-decoration:none;margin-left:5px;">
                    Kembali
                </a>
            </form>

        </div>
    </div>
</x-app-layout>