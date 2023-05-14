<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\AdminController;
use App\Models\Product\ProductTabs;
use Illuminate\Http\Request;

class ProductTabAdminController extends AdminController
{
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

        ProductTabs::create($data);

        return back();
    }


    public function update(Request $request)
    {
        $tabs = $request->toArray();

        foreach ($tabs as $id => $tab){
            if (!is_array($tab)){
                continue;
            }
            if (isset($tab['delete'])){
                ProductTabs::where('id', $id)->delete();
                continue;
            }
            ProductTabs::where('id', $id)->update([
                'name' => $tab['name'],
                'sort' => $tab['sort'],
                'is_show' => isset($tab['is_show']) ? 1 : 0,
            ]);
        }

        return back();
    }
}
