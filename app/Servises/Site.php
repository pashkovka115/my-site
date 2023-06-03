<?php

namespace App\Servises;

enum Site
{
    case cart_id;

    public static function cartId()
    {
        $id = '';
        if (isset(getallheaders()['User-Agent'])){
            $id = md5(getallheaders()['User-Agent']);
        }
        return self::cart_id->name . $id;
    }
}
