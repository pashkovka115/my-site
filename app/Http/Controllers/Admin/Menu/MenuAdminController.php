<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\AdminController;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuItem;
use Illuminate\Http\Request;

class MenuAdminController extends AdminController
{
    /**
     * Список меню
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $menus = json_decode(Menu::all());

        return view('admin.menu.index', ['menus' => $menus]);
    }

    /**
     * Сохранение нового меню
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        Menu::create($data);

        return back();
    }

    /**
     * Форма редактирования меню
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $menu = Menu::where('id', $id)->firstOrFail();

        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Обновление меню
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        Menu::where('id', $id)->update(['name' => $data['name']]);

        /*
         * Перенаправляем взависимости от нажатой кнопки
         */
        if ($request->has('save_and_edit')) {
            return redirect()->route('admin.menu.edit', ['id' => $id]);
        } elseif ($request->has('save_and_back')) {
            return redirect()->route('admin.menu');
        } /*elseif ($request->has('save_and_new')) {
            return redirect()->route('admin.*.create');
        }*/
    }

    /**
     * Удаление меню
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        MenuItem::where('menu_id', $id)->delete();
        Menu::where('id', $id)->delete();

        return back();
    }
}
