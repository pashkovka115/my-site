<?php

namespace App\Models\Feedback;

use App\Models\General;
use App\Models\Product\ProductColumns;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedbackTabs extends General
{
    use HasFactory;

    protected $table = 'feedback_tabs';
    public $timestamps = false;
    protected $guarded = ['id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Сортировка для детальной страницы редактирования
     */
    public function columns()
    {
        return $this->hasMany(FeedbackColumns::class, 'tab_id')
            ->orderBy('sort_single');
    }
}
