<?php

namespace App\Models\Product;

use App\Models\CategoryProduct\CategoryProduct;
use App\Models\Currency;
use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Property;
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

    protected $table = 'products';
    protected $guarded = ['id'];

    public function additionalFields()
    {
        return $this->hasMany(ProductAdditionalFields::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(CategoryProduct::class);
    }


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


    private static function currency()
    {
        $originCurrency = Currency::where('base', true)->first();
        if ($originCurrency) {
            $targetCurrencyCode = session('currency', $originCurrency->code);
            if ($targetCurrencyCode){
                return Currency::where('code', $targetCurrencyCode)->first();
            }
        }
        return false;
    }


    /* Start Fields */
    /*public function imgAnnounce(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) || $value == '' ? 'assets/site/img/shop/default_product.jpg' : $value,
        );
    }
    public function imgDetail(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) || $value == '' ? 'assets/site/img/shop/default_product.jpg' : $value,
        );
    }*/


    public function getPriceAttribute($value)
    {
        if(request()->segment(1) != Admin::prefix()){
            $currency = self::currency();
            return $currency->symbol_left . round(CurrencyConversion::convert($value), 2) . $currency->symbol_right;
        }
        return $value;
    }


    public function getOldPriceAttribute($value)
    {
        if ($value == 0){
            return 0;
        }
        if(request()->segment(1) != Admin::prefix()){
            $currency = self::currency();
            return $currency->symbol_left . round(CurrencyConversion::convert($value), 2) . $currency->symbol_right;
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
}
