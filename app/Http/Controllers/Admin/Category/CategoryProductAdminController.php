<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\AdminController;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductsRequest;
use App\Models\CategoryProduct\CategoryProduct;
use App\Models\CategoryProduct\CategoryProductAdditionalFields;
use App\Models\CategoryProduct\CategoryProductColumns;
use App\Models\CategoryProduct\CategoryProductTabs;

class CategoryProductAdminController extends AdminController
{
    const IMAGE_PATH = 'category_product';


    public function index()
    {
        return view('admin.category.index', [
            'tabs' => CategoryProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => CategoryProductColumns::column_meta_sort_list(),
            'items' => CategoryProduct::with('children')->paginate()
        ]);
    }


    public function create()
    {
        return view('admin.category.create', [
            'columns' => CategoryProductColumns::column_meta_sort_single(),
            'items_with_children' => CategoryProduct::with('children')->whereNull('parent_id')->get(),
            'existing_fields' => $this->getFieldsModel(CategoryProduct::class),
        ]);
    }


    public function store(StoreCategoryProductRequest $request)
    {
        $category = CategoryProduct::create($this->base_fields($request, self::IMAGE_PATH));

        $this->redirectAdmin($request, 'category_product', $category->id);
    }


    public function edit($id)
    {
        return view('admin.category.edit', [
            'item' => CategoryProduct::where('id', $id)->firstOrFail(),
            'items_with_children' => CategoryProduct::with('children')
                ->whereNull('parent_id')
                ->orderBy('sort')
                ->get(),
            'existing_fields' => $this->getFieldsModel(CategoryProduct::class),
            'tabs' => CategoryProductTabs::with('columns')->orderBy('sort')->get()->toArray(),
            'columns' => CategoryProductColumns::column_meta_sort_single(),
        ]);
    }


    public function update(UpdateCategoryProductsRequest $request, $id)
    {
        /*
         * Обновляем сортировку
         */
        $this->updateSort($request, CategoryProductColumns::class);

        /*
         * Работа со свойствами
         */
        $this->updateAdditionalFields($request, 'category_id', $id, CategoryProductAdditionalFields::class);

        /*
         * Работа с категорией
         */
        $category = CategoryProduct::where('id', $id)->firstOrFail();

        $data = $this->base_fields($request, self::IMAGE_PATH);

        if (is_null($data['img_announce'])) {
            unset($data['img_announce']);
        }
        if (is_null($data['img_detail'])) {
            unset($data['img_detail']);
        }

        if ($request->has('delete_img_announce')) {
            if (file_exists('storage/' . $category->img_announce)) {
                unlink('storage/' . $category->img_announce);
            }
            $data['img_announce'] = '';
        }

        if ($request->has('delete_img_detail')) {
            if (file_exists('storage/' . $category->img_detail)) {
                unlink('storage/' . $category->img_detail);
            }
            $data['img_detail'] = '';
        }

        $category->update($data);

        return $this->redirectAdmin($request, 'category_product', $id);
    }


    public function destroy($id)
    {
        CategoryProduct::destroy($id);

        return back();
    }
}
