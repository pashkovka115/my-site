<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\AdminController;
use App\Models\Page\PageTabs;
use Illuminate\Http\Request;

class PageTabAdminController extends AdminController
{
    /**
     * Сохранение шаблона отображения вкладок страниц
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'sort' => ['nullable', 'integer'],
            'is_show' => ['nullable'],
        ]);
        if (isset($data['is_show'])){
            $data['is_show'] = 1;
        }else{
            $data['is_show'] = 0;
        }
        if (is_null($data['sort'])){
            $data['sort'] = 10;
        }

        PageTabs::create($data);

        return back();
    }

    /**
     * Обновление шаблона отображения вкладок страниц
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $tabs = $request->toArray();

        foreach ($tabs as $id => $tab){
            if (!is_array($tab)){
                continue;
            }
            if (isset($tab['delete'])){
                PageTabs::where('id', $id)->delete();
                continue;
            }
            PageTabs::where('id', $id)->update([
                'name' => $tab['name'],
                'sort' => $tab['sort'],
                'is_show' => isset($tab['is_show']) ? 1 : 0,
            ]);
        }

        return back();
    }
}
