<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaGeneralRequest extends FormRequest
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
        return [
            'langs.name_*' => ['required', 'string'],
            'langs.slug_*' => ['nullable', 'string'],
            'announce' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'title' => ['nullable', 'string'],
            'name_lavel' => ['nullable', 'string'],
            'img_announce' => ['nullable', 'image'],
            'img_detail' => ['nullable', 'image'],
            'img_gallery.*' => ['nullable', 'image'],
        ];
    }
}
