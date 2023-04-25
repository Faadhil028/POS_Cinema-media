<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPSTORM_META\map;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $roles = Role::where('name', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $roles = Role::paginate(10);
        }
        return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        $TablePermission = $permissions->map(function ($item, $key) {
            return last(explode('.', $item->name));
        })->toArray();
        return view('admin.roles.create', [
            "permissions" => $permissions,
            "tables" => array_unique($TablePermission),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role = Role::create($validated);
        $role->givePermissionTo($request->permission);

        return to_route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $TablePermission = $permissions->map(function ($item, $key) {
            return last(explode('.', $item->name));
        })->toArray();
        return view('admin.roles.edit', [
            "permissions" => $permissions,
            "tables" => array_unique($TablePermission),
        ], compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required']]);
        $role->syncPermissions($request->permission);
        $role->update($validated);


        return to_route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'Role deleted.');
    }
}
