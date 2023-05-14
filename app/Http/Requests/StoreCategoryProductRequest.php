<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryProductRequest extends MetaGeneralRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'parent_id' => ['nullable', 'integer']
        ];

        return array_merge(parent::rules(), $rules);
    }
}
