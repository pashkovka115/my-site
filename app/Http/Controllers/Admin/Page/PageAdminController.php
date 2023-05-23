<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\AdminController;
use App\Http\Requests\StorePagesRequest;
use App\Http\Requests\UpdatePagesRequest;
use App\Models\Page\Page;
use App\Models\Page\PageAdditionalFields;
use App\Models\Page\PageColumns;
use App\Models\Page\PageImages;
use App\Models\Page\PageTabs;

class PageAdminController extends AdminController
{
    const IMAGE_PATH = 'page';


    public function index()
    {
        return view('admin.page.index', [
            'columns' => PageColumns::column_meta_sort_list(),
            'items' => Page::paginate()
        ]);
    }


    public function create()
    {
        return view('admin.page.create', [
            'tabs' => PageTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => PageColumns::column_meta_sort_single(),
        ]);
    }


    public function store(StorePagesRequest $request)
    {
        $page = Page::create($this->base_fields($request, self::IMAGE_PATH));

        return $this->redirectAdmin($request, 'page', $page->id);
    }


    public function edit($id)
    {
        $item = Page::where('id', $id)->firstOrFail();

        return view('admin.page.edit', [
            'item' => $item,
            'tabs' => PageTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => PageColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdatePagesRequest $request, $id)
    {
        /*
         * Обновляем сортировку
         */
        $this->updateSort($request, PageColumns::class);

        /*
         * Работа со страницей
         */
        $page = Page::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);
        $page->update($data);

        /*
         * Перенаправляем взависимости от нажатой кнопки
         */
        return $this->redirectAdmin($request, 'page', $id);
    }


    public function destroy($id)
    {
        Page::destroy($id);

        return back();
    }
}
