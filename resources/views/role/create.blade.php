<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            ➕ Tambah Role
        </h2>
    </x-slot>

    <div class="py-6">

        <div style="
            background:white;
            padding:25px;
            border-radius:14px;
            box-shadow:0 6px 18px rgba(0,0,0,0.08);
        ">

            <form action="{{ route('role.store') }}" method="POST">
                @csrf

                <div style="margin-bottom:20px;">
                    <label style="font-weight:bold;">
                        Nama Role
                    </label>

                    <input type="text"
                           name="name"
                           class="w-full border rounded mt-2 p-3"
                           placeholder="Contoh: admin">

                    @error('name')
                        <p style="color:red;margin-top:5px;">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit"
                        style="
                        background:#2563eb;
                        color:white;
                        padding:10px 18px;
                        border:none;
                        border-radius:8px;
                        ">
                    Simpan
                </button>

                <a href="{{ route('role.index') }}"
                   style="
                   background:#6b7280;
                   color:white;
                   padding:10px 18px;
                   border-radius:8px;
                   text-decoration:none;
                   margin-left:5px;
                   ">
                    Kembali
                </a>

            </form>

        </div>

    </div>
</x-app-layout>