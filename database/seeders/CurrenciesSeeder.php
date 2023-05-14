<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    public function run(): void
    {
        $currencies = [];

        $currencies[] = [
            'name' => 'Dollar',
            'code' => 'USD',
            'symbol_left' => '$',
            'symbol_right' => '',
            'base' => 0,
            'rate' => 65,
        ];
        $currencies[] = [
            'name' => 'Рубль',
            'code' => 'RUB',
            'symbol_left' => '',
            'symbol_right' => ' ₽',
            'base' => 1,
            'rate' => 1,
        ];
        $currencies[] = [
            'name' => 'Euro',
            'code' => 'EUR',
            'symbol_left' => '',
            'symbol_right' => ' €',
            'base' => 0,
            'rate' => 75,
        ];

        \DB::table('currencies')->insert($currencies);
    }
}
