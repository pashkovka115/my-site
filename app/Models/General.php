<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    /**
     * @return mixed
     * Впервую очередь нужен для получения одинакого результата динамического описания таблицы в интерфейсе админки
     * (модели с постфиксом "Columns")
     */
    public static function column_meta_sort_list()
    {
        return static::orderBy('sort_list')->get()->toArray();
    }

    public static function column_meta_sort_single()
    {
        return static::orderBy('sort_single')->get()->toArray();
    }
}
