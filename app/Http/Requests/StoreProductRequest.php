<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends MetaGeneralRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'category_id' => ['required', 'integer'],
            'is_show' => ['in:1,0'],
            'hit' => ['in:1,0'],
            'is_download' => ['in:1,0'],
            'min_quantity' => ['nullable', 'integer'],
            'quantity' => ['nullable', 'integer'],
            'price' => ['nullable', 'numeric'],
            'old_price' => ['nullable', 'numeric'],
            'width' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'length' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'sku' => ['nullable', 'string'],
            'upc' => ['nullable', 'string'],
            'ean' => ['nullable', 'string'],
            'jan' => ['nullable', 'string'],
            'isbn' => ['nullable', 'string'],
            'mpn' => ['nullable', 'string'],
        ];

        return array_merge(parent::rules(), $rules);
    }
}
