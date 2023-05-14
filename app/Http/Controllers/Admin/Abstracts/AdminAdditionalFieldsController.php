<?php

namespace App\Http\Controllers\Admin\Abstracts;

use App\Http\Controllers\AdminController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Если у модуля должны быть дополнительные поля то надо создавать *AdditionalFieldsController
 * и наследоваться от этого контроллера.
 */
abstract class AdminAdditionalFieldsController extends AdminController
{
    /**
     * @const MODEL - Модель.
     * @const TABLE - Таблица в БД.
     * @const FOREIGN_FIELD - Поле в таблице, связь с родительской таблицей.
     */
    public function __construct()
    {
        if (!defined('static::MODEL'))
        {
            throw new Exception('Константа MODEL не определена в подклассе ' . get_class($this));
        }
        if (!defined('static::FOREIGN_FIELD'))
        {
            throw new Exception('Константа FOREIGN_FIELD не определена в подклассе ' . get_class($this));
        }
        if (!defined('static::TABLE'))
        {
            throw new Exception('Константа TABLE не определена в подклассе ' . get_class($this));
        }

        parent::__construct();
    }


    public function store(Request $request)
    {
        $input_key = $request->input('key');
        $input_category_id = $request->input(static::FOREIGN_FIELD);

        $validator = Validator::make($request->all(), [
            static::FOREIGN_FIELD => 'required',
            'name' => 'nullable|string',
            'type' => 'nullable|string',
            'key' => [ // проверка по двум полям
                'required',
                'string',
                Rule::unique(static::TABLE)->where(function ($query) use ($input_key, $input_category_id) {
                    return $query->where('key', $input_key)
                        ->where(static::FOREIGN_FIELD, $input_category_id);
                }),
            ],
            'value' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $additional_field = new (static::MODEL)();
        $additional_field->{static::FOREIGN_FIELD} = $request->input(static::FOREIGN_FIELD);
        $additional_field->name = $request->input('name') ?? '';
        $additional_field->type = $request->input('type') ?? '';
        $additional_field->key = $request->input('key');
        $additional_field->value = $request->input('value') ?? '';
        $additional_field->save();

        return back();
    }
}
