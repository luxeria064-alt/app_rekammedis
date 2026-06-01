<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->latest()->get();

        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()
            ->route('role.index')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();

        return view('role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect()
            ->route('role.index')
            ->with('success', 'Role berhasil diperbarui.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('role.index')
            ->with('success', 'Role berhasil dihapus.');
    }
}