<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'product_language';


    public function up(): void
    {
        $languages = [
            [
                'code' => 'ru',
                'name' => 'Русский',
                'base' => true,
            ],
            [
                'code' => 'en',
                'name' => 'English',
                'base' => false,
            ],
        ];

        DB::table($this->table)->insert($languages);
    }


    public function down(): void
    {
        DB::table($this->table)->truncate();
    }
};
