<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\AdminController;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuItem;
use Illuminate\Http\Request;

class MenuAdminController extends AdminController
{
    public function index()
    {
        $menus = json_decode(Menu::all());

        return view('admin.menu.index', ['menus' => $menus]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        Menu::create($data);

        return back();
    }


    public function edit(string $id)
    {
        $menu = Menu::where('id', $id)->firstOrFail();

        return view('admin.menu.edit', compact('menu'));
    }


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


    public function destroy(string $id)
    {
        MenuItem::where('menu_id', $id)->delete();
        Menu::where('id', $id)->delete();

        return back();
    }
}
