<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'kelola pasien',
            'kelola dokter',
            'kelola rekam medis',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $dokter = Role::firstOrCreate(['name' => 'dokter']);
        $petugas = Role::firstOrCreate(['name' => 'petugas']);
        $admin->syncPermissions($permissions);
        $dokter->syncPermissions([
            'kelola rekam medis',
        ]);
        $petugas->syncPermissions([
            'kelola pasien',
        ]);
    }
}