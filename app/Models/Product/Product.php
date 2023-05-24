<?php

namespace App\Models\Product;

use App\Models\CategoryProduct\CategoryProduct;
use App\Models\Currency;
use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Property;
use App\Traits\Models\HasThumbnail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Servises\Admin;
use App\Servises\CurrencyConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;
    use HasThumbnail;

    protected $table = 'products';
    protected $guarded = ['id'];

    // todo: Удалить
    public function additionalFields()
    {
        return $this->hasMany(ProductAdditionalFields::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(CategoryProduct::class);
    }


    // todo: Удалить
    public function properties()
    {
        return $this->hasMany(
            Property::class,
        );
    }


    public function options()
    {
        return $this->hasMany(Option::class)->with('values');
    }


    public function gallery()
    {
        return $this->hasMany(ProductImages::class)->orderBy('sort');
    }

    /* Start Fields */


    public function getPriceAttribute($value)
    {
        if(request()->segment(1) != Admin::prefix()){
            return CurrencyConversion::convert($value);
        }
        return $value;
    }


    public function getOldPriceAttribute($value)
    {
        if ($value == 0){
            return 0;
        }
        if(request()->segment(1) != Admin::prefix()){
            return CurrencyConversion::convert($value);
        }
        return $value;
    }
    /* End Fields */


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

    protected function thumbnailDir(): string
    {
        return 'products';
    }
}
