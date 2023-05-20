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
        if (session('baseCurrency') == null){
            $baseCurrency = self::where('base', true)->first();
            session()->put('baseCurrency', $baseCurrency);
        }else{
            $baseCurrency = session('baseCurrency');
        }

        if ($baseCurrency){
            return $baseCurrency->code;
        }

        return false;
    }
}
