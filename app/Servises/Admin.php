<?php

namespace App\Servises;

enum Admin
{
    case admin;

    public static function prefix()
    {
        return self::admin->name;
    }
}
