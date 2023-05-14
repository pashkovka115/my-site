<?php

namespace App\Models\Product\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'product_attr_options';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function values()
    {
        return $this->hasMany(Value::class);
    }
}
