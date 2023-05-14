<?php

namespace App\Models\Product;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTabs extends General
{
    use HasFactory;

    protected $table = 'products_tabs';
    public $timestamps = false;
    protected $guarded = ['id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Сортировка для детальной страницы редактирования
     */
    public function columns()
    {
        return $this->hasMany(ProductColumns::class, 'tab_id')
            ->orderBy('sort_single');
    }
}
