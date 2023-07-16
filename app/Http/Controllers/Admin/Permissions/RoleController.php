<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Permissions\Permission;
use App\Models\Permissions\Role;
use Illuminate\Http\Request;

class RoleController extends AdminController
{
    /**
     * Список ролей
     */
    public function index()
    {
        return view('admin.role.index', [
            'items' => Role::paginate(20)
        ]);
    }

    /**
     * Форма добавления новой роли
     */
    public function create()
    {
        return view('admin.role.create', [
            'permissions' => Permission::all(['id', 'name', 'description'])
        ]);
    }

    /**
     * Сохранение новой роли
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:' . config('permission.table_names.roles')],
            'guard_name' => ['required', 'string'],
            'perms' => ['nullable', 'array'],
            'perms.*' => ['nullable', 'string'],
        ]);

        $role = \Spatie\Permission\Models\Role::create(['name' => $data['name']]);
        if (isset($data['perms'])){
            $role->syncPermissions($data['perms']);
        }

        return $this->redirectAdmin($request, 'role', $role->id);
    }

    /**
     * Форма редактирования роли
     */
    public function edit(string $id)
    {
        $role = \Spatie\Permission\Models\Role::where('id', $id)->firstOrFail();

        return view('admin.role.edit', [
            'permissions' => Permission::all(['id', 'name', 'description']),
            'role' => $role,
        ]);
    }

    /**
     * Обновление роли
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string',], // todo:  'unique:' . config('permission.table_names.roles') кроме себя
            'perms' => ['nullable', 'array'],
            'perms.*' => ['nullable', 'string'],
        ]);

        $role = \Spatie\Permission\Models\Role::findById($id);
        $role->update(['name' => $data['name']]);

        if (isset($data['perms'])){
            $role->syncPermissions($data['perms']);
        }

        return $this->redirectAdmin($request, 'role', $role->id);
    }

    /**
     * Удаление роли
     */
    public function destroy(string $id)
    {
        \Spatie\Permission\Models\Role::where('id', $id)->delete();

        return back();
    }
}
