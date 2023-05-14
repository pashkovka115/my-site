<?php

namespace App\Models\Product\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'product_attr_values';
    protected $guarded = ['id'];
    public $timestamps = false;


    /*public function option()
    {
        return $this->belongsTo(Option::class);
    }*/
}
