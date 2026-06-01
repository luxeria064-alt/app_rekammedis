<x-guest-layout>
    <div style="text-align:center;margin-bottom:20px;">
        <h1 style="font-size:28px;font-weight:bold;color:#1f2937;">
            🏥 Rekam Medis Klinik
        </h1>
        <p style="color:#6b7280;margin-top:5px;">
            Silakan login untuk masuk ke sistem
        </p>
    </div>

    <div style="background:white;padding:30px;border-radius:15px;box-shadow:0 10px 25px rgba(0,0,0,0.15);">

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

                <button type="submit"
                    style="background:#1f2937;color:white;padding:10px 25px;border:none;border-radius:8px;font-weight:bold;">
                    LOGIN
                </button>
            </div>
        </form>
    </div>

    <p style="text-align:center;margin-top:20px;color:#6b7280;font-size:13px;">
        © 2026 Sistem Informasi Rekam Medis Klinik
    </p>
</x-guest-layout>