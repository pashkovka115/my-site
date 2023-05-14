<?php

namespace App\Models\CategoryProduct;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProductColumns extends General //Model
{
    use HasFactory;

    protected $table = 'categories_product_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function additionalFields()
    {
        return $this->hasMany(CategoryProductAdditionalFields::class, 'category_id', 'category_id');
    }
}
