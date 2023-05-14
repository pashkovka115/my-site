<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\Abstracts\AdminAdditionalFieldsController;
use App\Models\CategoryProduct\CategoryProductAdditionalFields;
use Illuminate\Http\Request;

class CategoryProductAdditionalFieldsController extends AdminAdditionalFieldsController
{
    const FOREIGN_FIELD = 'category_id';
    const MODEL = CategoryProductAdditionalFields::class;
    const TABLE = 'categories_product_additional_fields';

    public function store(Request $request){
        return parent::store($request);
    }
}
