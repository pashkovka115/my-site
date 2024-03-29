<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\AdminController;
use App\Models\Page\PageColumns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageColumnAdminController extends AdminController
{
    /**
     * Обновление шаблона отображения колонок страниц
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $request->request->remove('_token');

        $data = Validator::make($request->all(), [
            '*.show_name' => ['required', 'string'],
            '*.sort_list' => ['nullable', 'integer'],
            '*.sort_single' => ['nullable', 'integer'],
            '*.tab_id' => ['required', 'integer'],
            '*.is_show_anons' => ['nullable', 'string'],
            '*.is_show_single' => ['nullable', 'string'],
        ]);

        foreach ($data->validated() as $id => $column) {
            $column['is_show_anons'] = isset($column['is_show_anons']) ? 1 : 0;
            $column['is_show_single'] = isset($column['is_show_single']) ? 1 : 0;

            PageColumns::where('id', (int)$id)->update($column);
        }

        return back();
    }
}
