<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\AdminController;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductsRequest;
use App\Models\CategoryProduct\CategoryProduct;
use App\Models\CategoryProduct\CategoryProductColumns;
use App\Models\CategoryProduct\CategoryProductTabs;

class CategoryProductAdminController extends AdminController
{
    const IMAGE_PATH = 'category_product';

    /**
     * Список категорий товаров
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('admin.category.index', [
            'tabs' => CategoryProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => CategoryProductColumns::column_meta_sort_list(),
            'items' => CategoryProduct::with('children')->paginate()
        ]);
    }

    /**
     * Форма добавления новой категории товаров
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.category.create', [
            'columns' => CategoryProductColumns::column_meta_sort_single(),
            'items_with_children' => CategoryProduct::with('children')->whereNull('parent_id')->get(),
//            'existing_fields' => $this->getFieldsModel(CategoryProduct::class),
        ]);
    }

    /**
     * Сохранение новой категории товаров
     * @param StoreCategoryProductRequest $request
     * @return void
     */
    public function store(StoreCategoryProductRequest $request)
    {
        $category = CategoryProduct::create($this->base_fields($request, self::IMAGE_PATH));

        $this->redirectAdmin($request, 'category_product', $category->id);
    }

    /**
     * Форма редактирования категории товаров
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        return view('admin.category.edit', [
            'item' => CategoryProduct::where('id', $id)->firstOrFail(),
            'items_with_children' => CategoryProduct::with('children')
                ->whereNull('parent_id')
                ->orderBy('sort')
                ->get(),
//            'existing_fields' => $this->getFieldsModel(CategoryProduct::class),
            'tabs' => CategoryProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => CategoryProductColumns::column_meta_sort_single(),
        ]);
    }

    /**
     * Обновление категории товаров
     * @param UpdateCategoryProductsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function update(UpdateCategoryProductsRequest $request, $id)
    {
        /*
         * Обновляем сортировку
         */
        $this->updateSort($request, CategoryProductColumns::class);

        /*
         * Работа с категорией
         */
        $category = CategoryProduct::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);

        $category->update($data);

        return $this->redirectAdmin($request, 'category_product', $id);
    }

    /**
     * Удаление категории товаров
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        CategoryProduct::destroy($id);

        return back();
    }
}
