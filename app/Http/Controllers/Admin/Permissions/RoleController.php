<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
use App\Models\Permissions\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        //
    }

    /**
     * Сохранение новой роли
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Форма редактирования роли
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Обновление роли
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Удаление роли
     */
    public function destroy(string $id)
    {
        //
    }
}
