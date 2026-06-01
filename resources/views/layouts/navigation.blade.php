<nav style="width:230px;min-height:100vh;background:#1f2937;color:white;position:fixed;left:0;top:0;padding:20px;">
    <h2 style="font-size:20px;font-weight:bold;margin-bottom:30px;">
        🏥 Rekam Medis Klinik
    </h2>

    <a href="{{ route('dashboard') }}"
       style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('dashboard') ? '#374151' : 'transparent' }};">
        🏠 Dashboard
    </a>

    @can('kelola pasien')
        <a href="{{ route('pasien.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('pasien.*') ? '#374151' : 'transparent' }};">
            👤 Data Pasien
        </a>
    @endcan

    @can('kelola dokter')
        <a href="{{ route('dokter.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('dokter.*') ? '#374151' : 'transparent' }};">
            👨‍⚕️ Data Dokter
        </a>
    @endcan

    @can('kelola rekam medis')
        <a href="{{ route('rekam-medis.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('rekam-medis.*') ? '#374151' : 'transparent' }};">
            📋 Rekam Medis
        </a>
    @endcan

    @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
        <hr style="margin:15px 0;border-color:#374151;">

        <p style="font-size:12px;color:#9ca3af;margin-bottom:8px;text-transform:uppercase;">
            Manajemen Akses
        </p>
    @endcanany

    @can('role-list')
        <a href="{{ route('role.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('role.*') ? '#374151' : 'transparent' }};">
            🔐 Data Role
        </a>
    @endcan

    @can('role-list')
        <a href="{{ route('permission.index') }}"
           style="display:block;color:white;padding:10px;text-decoration:none;border-radius:6px;background:{{ request()->routeIs('permission.*') ? '#374151' : 'transparent' }};">
            🛡️ Data Permission
        </a>
    @endcan

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