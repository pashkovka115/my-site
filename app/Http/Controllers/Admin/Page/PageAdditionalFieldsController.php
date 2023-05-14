<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\Abstracts\AdminAdditionalFieldsController;
use App\Models\Page\PageAdditionalFields;
use Illuminate\Http\Request;

class PageAdditionalFieldsController extends AdminAdditionalFieldsController
{
    const FOREIGN_FIELD = 'page_id';
    const MODEL = PageAdditionalFields::class;
    const TABLE = 'page_additional_fields';


    public function store(Request $request){
        return parent::store($request);
    }
}
