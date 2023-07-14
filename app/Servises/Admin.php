<?php

namespace App\Servises;

enum Admin
{
    case admin;
    case super_user;

    /**
     * @return string
     * Префикс администраторской части сайта
     * в адресной строке браузера
     */
    public static function prefix()
    {
        return self::admin->name;
    }

    /**
     * @return string
     * Наименование роли пользователя
     * с наивысшими привелегиями
     */
    public static function superUserName()
    {
        return self::super_user->name;
    }
}
