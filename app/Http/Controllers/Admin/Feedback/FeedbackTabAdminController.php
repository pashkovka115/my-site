<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\AdminController;
use App\Models\Feedback\FeedbackTabs;
use App\Models\Product\ProductTabs;
use Illuminate\Http\Request;

class FeedbackTabAdminController extends AdminController
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

        FeedbackTabs::create($data);

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
                FeedbackTabs::where('id', $id)->delete();
                continue;
            }
            FeedbackTabs::where('id', $id)->update([
                'name' => $tab['name'],
                'sort' => $tab['sort'],
                'is_show' => isset($tab['is_show']) ? 1 : 0,
            ]);
        }

        return back();
    }
}
