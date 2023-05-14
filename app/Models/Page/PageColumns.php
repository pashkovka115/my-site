<?php

namespace App\Models\Page;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageColumns extends General
{
    use HasFactory;

    protected $table = 'pages_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function additionalFields()
    {
        return $this->hasMany(PageAdditionalFields::class, 'page_id', 'page_id');
    }
}
