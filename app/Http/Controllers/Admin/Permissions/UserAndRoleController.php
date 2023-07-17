<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Permissions\Permission;
use App\Models\Permissions\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserAndRoleController extends AdminController
{
    /**
     * Список пользователей и их ролей
     */
    public function index()
    {
        return view('admin.user_and_role.index', [
            'items' => User::paginate()
        ]);
    }

    /**
     * Форма редактирования связи пользователя и его роли
     */
    public function edit(string $id)
    {
        return view('admin.user_and_role.edit', [
            'user' => User::with('roles')->where('id', $id)->firstOrFail(),
            'roles' => \Spatie\Permission\Models\Role::all(),
        ]);
    }

    /**
     * Обновление связи ролей и пользователей
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['nullable', 'string'],
        ]);

        $user = User::where('id', $id)->firstOrFail();
        if (isset($data['roles'])){
            $user->syncRoles($data['roles']);
        }

        return $this->redirectAdmin($request, 'user_and_role', $user->id);
    }
}
