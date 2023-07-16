<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\AdminController;
use App\Models\Permissions\Permission;
use App\Servises\ReaderControllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapPermissionController extends AdminController
{
    /**
     * Список разрешений
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.permission.index', [
            'items' => Permission::paginate(20),
        ]);
    }

    /**
     * Форма добавления разрешения
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.permission.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        $perm = \Spatie\Permission\Models\Permission::create($data);

        return $this->redirectAdmin($request, 'permission', $perm->id);
    }

    /**
     * Форма редактирования разрешения
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        return view('admin.permission.edit',[
            'item' => Permission::where('id', $id)->firstOrFail()
        ]);
    }

    /**
     * Обновление разрешения
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'description' => ['nullable', 'string']
        ]);
        Permission::where('id', $id)->update($data);

        return $this->redirectAdmin($request, 'permission', $id);
    }


    public function destroy(string $id)
    {
        \Spatie\Permission\Models\Permission::where('id', $id)->delete();

        return back();
    }

    /**
     * Синхронизировать разрешения.
     * Удаляет разрешения из БД, сканирует систему и добавляет актуальные разрешения.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sync()
    {
        Permission::where('id', '>', 0)->delete();

        $methods = (new ReaderControllers())->getActions();

        $num = 0;
        foreach ($methods as $method){
            $num++;
            Permission::create([
                'name' => $method['action'],
                'description' => $method['doc'] ? $method['doc'] : "$num",
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return back();
    }
}
