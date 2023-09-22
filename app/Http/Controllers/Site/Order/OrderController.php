<?php

namespace App\Http\Controllers\Site\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->dd();

        if (!auth()->check()){
            $data_customer = $request->validate([
                'customer_name' => ['nullable', 'string'],
                'customer_email' => ['required', 'email'],
                'customer_password' => ['required', 'string'],
            ]);
        }
    }

    public function show()
    {
        echo __METHOD__;
    }
}
