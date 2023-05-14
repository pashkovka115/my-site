<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalFields extends Model
{
    use HasFactory;

    protected $table = 'product_additional_fields';
    public $timestamps = false;
    protected $guarded = ['id'];
}
