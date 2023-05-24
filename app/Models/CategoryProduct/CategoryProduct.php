<?php

namespace App\Models\CategoryProduct;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CategoryProduct extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'categories_product';
    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')
            ->with('children')
            ->orderBy('sort');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate(); // Не обновлять
    }
}
