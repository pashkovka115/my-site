<?php

namespace App\Models\Page\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'page_attr_options';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function values()
    {
        return $this->hasMany(Value::class);
    }
}
