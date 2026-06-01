<nav style="width:230px;min-height:100vh;background:#1f2937;color:white;position:fixed;left:0;top:0;padding:20px;">
    <h2 style="font-size:20px;font-weight:bold;margin-bottom:30px;">
        🏥 Rekam Medis Klinik
    </h2>

    <a href="{{ route('dashboard') }}"
       style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('dashboard') ? '#374151' : 'transparent' }};">
        🏠 Dashboard
    </a>

    @role('admin|petugas')
        <a href="{{ route('pasien.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('pasien.*') ? '#374151' : 'transparent' }};">
            👤 Data Pasien
        </a>
    @endrole

    @role('admin')
        <a href="{{ route('dokter.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('dokter.*') ? '#374151' : 'transparent' }};">
            👨‍⚕️ Data Dokter
        </a>
    @endrole

    @role('admin|dokter')
        <a href="{{ route('rekam-medis.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('rekam-medis.*') ? '#374151' : 'transparent' }};">
            📋 Rekam Medis
        </a>
    @endrole

    <hr style="margin:20px 0;border-color:#374151;">

    <p style="font-size:14px;margin-bottom:5px;">
        {{ Auth::user()->name }}
    </p>

    <p style="font-size:12px;color:#d1d5db;margin-bottom:15px;">
        Role: {{ Auth::user()->getRoleNames()->first() }}
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background:#dc2626;color:white;padding:8px 15px;border:none;border-radius:5px;cursor:pointer;">
            Logout
        </button>
    </form>
</nav>