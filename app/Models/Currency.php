<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static function baseCode()
    {
        $baseCurrency = self::where('base', true)->first();
        if ($baseCurrency){
            return $baseCurrency->code;
        }

        return false;
    }
}
