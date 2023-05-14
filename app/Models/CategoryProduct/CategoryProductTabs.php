<?php

namespace App\Models\CategoryProduct;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProductTabs extends General
{
    use HasFactory;

    protected $table = 'categories_product_tabs';
    public $timestamps = false;
    protected $guarded = ['id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Сортировка для детальной страницы редактирования
     */
    public function columns()
    {
        return $this->hasMany(CategoryProductColumns::class, 'tab_id')
            ->orderBy('sort_single');
    }
}
