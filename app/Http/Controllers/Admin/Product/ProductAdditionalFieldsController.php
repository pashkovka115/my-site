<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\Abstracts\AdminAdditionalFieldsController;
use App\Models\Product\ProductAdditionalFields;
use Illuminate\Http\Request;

class ProductAdditionalFieldsController extends AdminAdditionalFieldsController
{
    const FOREIGN_FIELD = 'product_id';
    const MODEL = ProductAdditionalFields::class;
    const TABLE = 'product_additional_fields';


    public function store(Request $request){
        return parent::store($request);
    }
}
