<?php

namespace App\Models\Product;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColumns extends General
{
    use HasFactory;

    protected $table = 'products_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function additionalFields()
    {
        return $this->hasMany(ProductAdditionalFields::class, 'product_id', 'product_id');
    }
}
