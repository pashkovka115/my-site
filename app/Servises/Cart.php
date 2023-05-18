<?php

namespace App\Servises;

use Illuminate\Support\Facades\Session;

class Cart
{
    const CART = 'cart';
    /**
     * @var self
     */
    static $instance = null;
    /**
     * @var $session Session
     */
    private $session;

    private function __construct()
    {
        if (!session()->has(self::CART)) {
            session([self::CART => []]);
        }
    }

    private static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            self::$instance->session = \session();
        }

        return self::$instance;
    }

    /**
     * @param array $data
     * @return void
     * Устанавливает значение корзины.
     * Если значение установлено перепишет его.
     */
    public static function set(array $data)
    {
        self::getInstance()->session->put([self::CART => $data]);
    }

    /**
     * @param array $data
     * @return void
     * Добавляет значение в корзину.
     * Если корзины нет создаст её.
     */
    public static function add(array $data)
    {
        self::getInstance()->session->push(self::CART, $data);
    }


    /**
     * @param string $key
     * @return void
     * Удаляет значение по ключу.
     * Возможно удаление вложенного масива через "."
     */
    public static function deleteKey(string $key)
    {
        self::getInstance()->session->forget(self::CART . ".$key");
    }


    /**
     * @return void
     * Удаляет корзину.
     */
    public static function delete()
    {
        self::getInstance()->session->forget(self::CART);
    }


    /**
     * @param array $data
     * @return void
     * Тоже самое что и метод set(), только другим способом.
     */
    public static function update(array $data)
    {
        self::delete();
        self::set($data);
    }
}