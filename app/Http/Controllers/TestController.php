<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $reader = new \App\Servises\ReaderControllers();
        var_dump($reader->getActions());
    }
}
