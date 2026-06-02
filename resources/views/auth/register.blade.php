<x-guest-layout>
    <div style="text-align:center;margin-bottom:20px;">
        <h1 style="font-size:28px;font-weight:bold;color:#1f2937;">
            🏥 Register User
        </h1>
        <p style="color:#6b7280;margin-top:5px;">
            Buat akun pengguna sistem klinik
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />

            <select id="role"
                name="role"
                required
                style="width:100%;padding:10px;border:1px solid #d1d5db;border-radius:8px;margin-top:5px;">
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="dokter">Dokter</option>
                <option value="petugas">Petugas</option>
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}">
                Sudah punya akun?
            </a>

            <button type="submit"
                style="background:#1f2937;color:white;padding:10px 25px;border:none;border-radius:8px;font-weight:bold;">
                REGISTER
            </button>
        </div>
    </form>
</x-guest-layout>