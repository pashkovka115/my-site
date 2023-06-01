<?php

namespace App\Servises;

class Menu
{
    public static function name($name)
    {
        $menu = \App\Models\Menu\Menu::with('items')
            ->where('name', $name)
            ->firstOrFail();

        return view('site.mycomponents.top_menu.menu', compact('menu'));
    }
}
