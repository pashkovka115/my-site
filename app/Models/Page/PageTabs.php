<?php

namespace App\Models\Page;

use App\Models\General;
use App\Models\Product\ProductColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageTabs extends General
{
    use HasFactory;

    protected $table = 'pages_tabs';
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Сортировка для детальной страницы редактирования
     */
    public function columns()
    {
        return $this->hasMany(PageColumns::class, 'tab_id')
            ->orderBy('sort_single');
    }
}
