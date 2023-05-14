<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    public $timestamps = false;
    protected $guarded = ['id'];


    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_id')
            ->with('children')
            ->where('parent_id', 0)
            ->orderBy('sort');
    }
}
