<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAdditionalFields extends Model
{
    use HasFactory;

    protected $table = 'page_additional_fields';
    public $timestamps = false;
    protected $fillable = [
        'page_id',
        'key',
        'name',
        'type',
        'value',
        'is_show',
    ];
}
