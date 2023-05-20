<?php

namespace App\Servises;

enum Site
{
    case cart_id;

    public static function cartId()
    {
        return self::cart_id->name;
    }
}
