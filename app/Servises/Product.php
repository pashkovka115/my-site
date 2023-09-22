<?php

namespace App\Servises;

enum Product
{
    public static function statuses()
    {
        return [
            'Сборка заказа',
            'Собран. Ожидает отправки',
            'Передача в доставку',
            'В доставке',
            'Получен',
            'Возвращён',
            'Удалён',
        ];
    }
}
