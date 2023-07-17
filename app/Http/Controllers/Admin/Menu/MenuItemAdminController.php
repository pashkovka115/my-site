<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\AdminController;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuItem;
use App\Models\Page\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuItemAdminController extends AdminController
{
    /**
     * Сохранение нового пункта меню
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'menu_id' => 'required|integer',
            'parent_id' => 'required|integer',
        ]);

        MenuItem::create($data);

        return back();
    }

    /**
     * Форма редактирования пункта меню
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $links = ['register', 'login', 'logout'];
        $page_aliases = Page::all('slug');

        foreach ($page_aliases as $slug){
            $links[] = $slug->slug;
        }

        $routes = Route::getRoutes()->getRoutes();

        foreach ($routes as $route){
            $methods = $route->methods();
            $route_name = $route->getName();
            if ($route_name and str_starts_with($route_name, 'site') and in_array('GET', $methods)){
                $links[] = $route->uri();
            }
        }

        $menu = Menu::where('id', $id)->firstOrFail();
        $items = MenuItem::with('children')
            ->where('menu_id', $id)
            ->where('parent_id', 0)
            ->orderBy('sort')
            ->get();

        return view('admin.menu_item.edit', compact('items', 'menu', 'links'));
    }

    /**
     * Обновление пункта меню
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'input_menu_json' => 'required|string',
            'menu_id' => 'required|integer'
        ]);

        $new_menu = json_decode($data['input_menu_json'], true);

        $sort = 100;
        foreach ($new_menu as $item){
            $tmp = $item;
            unset($item['id']);
            $item['sort'] = $sort;
            MenuItem::where('menu_id', $data['menu_id'])->where('id', $tmp['id'])->update($item);
            $sort += 100;
        }

        return back();
    }

    /**
     * Удаление пункта меню
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        MenuItem::where('id', $id)->delete();

        return back();
    }
}
